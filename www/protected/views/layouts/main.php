<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl . '/images/favicon.ico'; ?>" />

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

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'На главную', 'url'=>array('/site/index')),
                array('label'=>'Пользователи', 'url'=>array('/user/admin'),'visible'=>Yii::app()->user->checkAccess('admin')),
                //array('label'=>'Связаться с нами', 'url'=>array('/site/contact'),'visible'=>!Yii::app()->user->checkAccess('admin')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                //array('label'=>'Создать объект S','url'=>array('/geoobjects/create'),'visible'=>Yii::app()->user->checkAccess('creator')),
                //array('label'=>'Создать объект Y','url'=>array('/geoobjects/create'),'visible'=>Yii::app()->user->checkAccess('creator')),
               //array('label'=>'Объекты','url'=>array('/geoobjects/index'),'visible'=>Yii::app()->user->checkAccess('usual')),
                //array('label'=>'КартаЯндекс','url'=>array('/geoobjects/showY')),
               //array('label'=>'КартаСпутник','url'=>array('/geoobjects/showS')),
                //array('label'=>'НЕсколько вкладок','url'=>array('/vsabitdeclar/create')),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>    
  
	<div class="clear"></div>

	<div id="footer">
	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
		Copyright &copy; <?php echo date('Y'); ?><br/>
		</div><!-- footer -->

</div><!-- page -->

</body>
</html>
