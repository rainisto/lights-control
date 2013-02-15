<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />        

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">          

            <div id="mainmenu">
                <?php
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    //'type' => 'inverse', // null or 'inverse'
                    'brand' => CHtml::encode(Yii::app()->name),
                    //'brandOptions'=>'CHtml::image(Yii::app()->assetManager->publish("images/OnLamp240.png"))',
                    'brandUrl' => array('/site/index'),
                    'collapse' => true, // requires bootstrap-responsive.css
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'items' => array(
                                array('label' => 'Control', 'url' => array('/control'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Scenes', 'url' => array('/scene'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Scheduler', 'url' => array('/scheduler'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Settings', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                        array('label' => 'Floors', 'url' => array('/floors'), 'visible' => !Yii::app()->user->isGuest),
                                        array('label' => 'Rooms', 'url' => array('/rooms'), 'visible' => !Yii::app()->user->isGuest),
                                        array('label' => 'Devices', 'url' => array('/devices'), 'visible' => !Yii::app()->user->isGuest),
                                        array('label' => 'Users', 'url' => array('/users'), 'visible' => !Yii::app()->user->isGuest),
                                        array('label' => 'Roles', 'url' => array('/roles'), 'visible' => !Yii::app()->user->isGuest),
                                        array('label' => 'Log', 'url' => array('/site/log'), 'visible' => !Yii::app()->user->isGuest),
                                       // array('label' => 'Settings', 'url' => array('/settings'), 'visible' => !Yii::app()->user->isGuest),
                                )),
                            ),
                        ),
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
                                array('label' => CHtml::encode(Yii::app()->user->name), 'url' => '#', 'items' => array(
                                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                        array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                                )),
                            ),
                        ),
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Developed by <a href="http://www.conradvassallo.com">Conrad Vassallo</a>.<br/>                
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
