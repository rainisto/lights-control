<?php

class ControlController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';
    public $status = array();

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
                'actions' => array('index', 'view', 'control', 'command', 'rpc', 'getDevices'),
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

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Devices('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Devices']))
            $model->attributes = $_GET['Devices'];

        //get device status
        $zwDevices = file_get_contents(Yii::app()->params['serverurl'] . "/server.php?command=devices");

        if ($zwDevices == "Error") {
            Yii::app()->user->setFlash('error', "Failed to connect to server!");
        } else {
            $devicelist = explode("#", $zwDevices);
            foreach ($devicelist as $device) {
                $node = explode("~", $device);
                $this->status[$node[1]] = $node[4];
            }
        }


        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionCommand() {
        $url = Yii::app()->params['serverurl'] . "/server.php?command=control&node=" . $_GET['node'] . "&type=" . urlencode($_GET['type']) . "&level=" . $_GET['level'];

        // create a new cURL resource
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // grab URL and pass it to the browser
        curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        $this->redirect(array('index'));
    }

    public function actionGetDevices() {
        $devices = Devices::model()->findAll();

        //get each device status
        $zwDevices = file_get_contents(Yii::app()->params['serverurl'] . "/server.php?command=devices");
        $status = array();
        if (strlen($zwDevices)) {
            $devicelist = explode("#", $zwDevices);
            foreach ($devicelist as $device) {
                $node = explode("~", $device);
                $status[$node[1]] = $node[4];
            }
        }

        $nodes = array();
        foreach ($devices as $node) {
            $tmpnodes = array();
            $tmpnodes["idtbl_device"] = $node["idtbl_device"];
            $tmpnodes["tbl_device_name"] = $node["tbl_device_name"];
            $tmpnodes["tbl_device_nodeid"] = $node["tbl_device_nodeid"];
            $tmpnodes["tbl_device_type"] = $node["tbl_device_type"];
            $tmpnodes["tbl_rooms_idtbl_room"] = $node["tbl_rooms_idtbl_room"];
            $tmpnodes["tbl_device_level"] = $status[$node["tbl_device_nodeid"]];
            array_push($nodes, $tmpnodes);
        }


        if ($nodes) {
            echo CJSON::encode($nodes);
        }
    }

    public function actionRpc() {
        $url = Yii::app()->params['serverurl'] . "/server.php?command=control&node=" . $_GET['node'] . "&type=" . urlencode($_GET['type']) . "&level=" . $_GET['level'];

        // create a new cURL resource
        $ch = curl_init();

        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // grab URL and pass it to the browser
        $res = curl_exec($ch);

        // close cURL resource, and free up system resources
        curl_close($ch);

        echo $res;
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
