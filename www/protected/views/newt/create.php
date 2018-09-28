<?php
/* @var $this NewtController */
/* @var $model Newt */

$this->breadcrumbs=array(
	'Newts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Newt', 'url'=>array('index')),
	array('label'=>'Manage Newt', 'url'=>array('admin')),
);
?>

<h1>Create Newt</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>