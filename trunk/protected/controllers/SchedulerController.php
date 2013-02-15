<?php

class SchedulerController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $events = array();

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {        
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Scheduler;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //Save task to database
        if (isset($_POST['Scheduler'])) {
            $model->attributes = $_POST['Scheduler'];

            if (count($_POST['Scheduler']['tbl_schedule_recurring']) > 0)
                $model->tbl_schedule_recurring = implode(',', $_POST['Scheduler']['tbl_schedule_recurring']);

            if ($model->save()) {
                //create crontab schedule 
                $this->generateAllcronjobs();

                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->tbl_schedule_recurring = explode(',', $model->tbl_schedule_recurring);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Scheduler'])) {
            $_POST['Scheduler']['tbl_schedule_recurring'] = implode(',', $_POST['Scheduler']['tbl_schedule_recurring']);
            $model->attributes = $_POST['Scheduler'];

            if ($model->save()) {
                $this->generateAllcronjobs();
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    private function generateCronJob($min, $hr, $day, $month, $dayOfWeek, $devices, $state) {
        $jobs = array();
        $count = 0;
        //get all devices for this particualr scene
        foreach ($devices as $device) {

            //get device details
            $node = Devices::model()->find("idtbl_device=" . $device->tbl_devices_idtbl_device);

            if ($node) {
                if ($state == 'off')
                    $level = 0;
                else
                    $level = $device->tbl_scene_device_level;

                //build cron job string
                $jobs[$count] = $min . ' ' . $hr . ' ' . $day . ' ' . $month . ' ' . $dayOfWeek . ' curl "' .
                        "http://localhost"  . Yii::app()->createUrl("control/command", array("node" => $node->tbl_device_nodeid,
                            "type" => $node->tbl_device_type, "level" => $level)) . '"';

                $count++;
            }
        }
        return $jobs;
    }

    private function getEventDetails($id, $state) {
        $model = $this->loadModel($id);
        //$model = new Scheduler();
        //get devices for the current scene
        $devices = SceneDevices::model()->findAll("tbl_scene_idtbl_scene=" . $model->tbl_scenes_idtbl_scene);

        $time = "";

        if ($state == 'off')
            $time = $model->tbl_schedule_time_off;
        else
            $time = $model->tbl_schedule_time_on;


        $hr = intval(substr($time, 0, 2));
        $min = intval(substr($time, 3, 2));

        $day = "";
        $month = "";

        if ($model->tbl_schedule_date) {
            $date = explode('-', $model->tbl_schedule_date);
            $month = $date[1];
            $day = $date[2];
        } else {
            $month = 0;
            $day = 0;
        }

        //get day/s
        if (count($model->tbl_schedule_recurring))
            $recurring = true;
        else
            $recurring = false;

        $jobs = array();

        if ($recurring) {
            //generate crojob for every recurring day
            $recurringdays = explode(',', $model->tbl_schedule_recurring);
            foreach ($recurringdays as $dayofweek) {
                $dayofweek_map = array('Sun' => '0', 'Mon' => '1', 'Tue' => '2', 'Wed' => '3', 'Thu' => '4', 'Fri' => '5', 'Sat' => '6');
                array_push($jobs, $this->generateCronJob($min, $hr, '*', '*', $dayofweek_map[$dayofweek], $devices, $state));
            }
        } else {
            //generate one time event on a particular day            
            $jobs = $this->generateCronJob($min, $hr, $day, $month, '*', $devices, $state);
        }
        return $jobs;
    }

    private function generateAllcronjobs() {
        $model = Scheduler::model()->findAll();

        $cronjob = new Ssh2_crontab_manager(Yii::app()->params['sshServer'], Yii::app()->params['sshPort'], Yii::app()->params['sshUser'], Yii::app()->params['sshPass']);
        $cronjob->remove_crontab();

        foreach ($model as $event) {
            $jobs = $this->getEventDetails($event->idtbl_schedule, 'on');

            //create cronjob                
            foreach ($jobs as $job) {
                $cronjob->append_cronjob($job);
                $cronjob->write_to_file();
            }

            $jobs = $this->getEventDetails($event->idtbl_schedule, 'off');

            //create cronjob                
            foreach ($jobs as $job) {
                $cronjob->append_cronjob($job);
                $cronjob->write_to_file();
            }

            $cronjob->remove_file();
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        //update crontab
        $this->generateAllcronjobs();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('Scheduler');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
        $this->actionAdmin();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Scheduler('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Scheduler']))
            $model->attributes = $_GET['Scheduler'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Scheduler::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'scheduler-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
