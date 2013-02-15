<?php

class DevicesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $zwDevices = array();

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
                'actions' => array('index', 'view', 'control'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'import'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'import', 'deleteAll'),
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
        $model = new Devices;
        $this->zwDevices = $this->getDevices();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Devices'])) {
            $model->attributes = $_POST['Devices'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idtbl_device));
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
        $this->zwDevices = $this->getDevices();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Devices'])) {
            $model->attributes = $_POST['Devices'];
            
            //get room by room id
            $room = Rooms::model()->findAllByPk($model->attributes['tbl_rooms_idtbl_room']);           
            if (count($room))
                foreach($room as $rm){
                    file_get_contents(Yii::app()->params['serverurl']."/server.php?command=setnode&node=".urlencode($model->attributes['tbl_device_nodeid'])."&name=".urlencode($model->attributes['tbl_device_name'])."&zone=".$rm->tbl_room_name);                
                }
            
            if ($model->save()){
                //update server details               
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    private function getDevices() {
        $zwDevices = file_get_contents(Yii::app()->params['serverurl']."/server.php?command=devices");
        $nodes = array();

        if (strlen($zwDevices)) {
            $devicelist = explode("#", $zwDevices);

            foreach ($devicelist as $device) {
                $node = explode("~", $device);
                if ($node) {
                    $nodes[$node[1]] = 'Node ' . $node[1];
                }
            }

            return $nodes;
        }
        else
            return array("No nodes found!");
    }

    public function actionImport() {
        $zwDevices = file_get_contents(Yii::app()->params['serverurl']."/server.php?command=devices");
        $nodes = array();

        if (strlen($zwDevices)) {
            $devicelist = explode("#", $zwDevices);
            foreach ($devicelist as $device) {
                $node = explode("~", $device);

                //check if node already exists in database
                $nodes = Devices::model()->findAll('tbl_device_nodeid=:nodeid', array('nodeid'=>$node[1]));

                //if does not exists, add new node to database                
                if (count($nodes)==0) {
                    $model = new Devices;
                    $model->tbl_device_name = $node[0];
                    $model->tbl_device_nodeid = $node[1];
                    $model->tbl_rooms_idtbl_room = 1;
                    $model->tbl_device_type = $node[3];
                    $model->save(false);
                }
            }
        }        
        else
            Yii::app()->user->setFlash('error', "Failed to connect to server!");

        $this->redirect(array('admin'));
    }

    public function actionDeleteAll() {
        $SQL = "DELETE FROM tbl_devices ";
        $connection = Yii::app()->db;
        $command = $connection->createCommand($SQL);
        $rowCount = $command->execute(); // execute the non-query SQL        
        $this->redirect(array('admin'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//		$dataProvider=new CActiveDataProvider('Devices');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
        $this->actionAdmin();
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Devices('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Devices']))
            $model->attributes = $_GET['Devices'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    public function actionControl() {
        $model = new Devices('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Devices']))
            $model->attributes = $_GET['Devices'];

        $this->render('control', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Devices::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'devices-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
