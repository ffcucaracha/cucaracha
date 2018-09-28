<?php
/* @var $this NewtController */
/* @var $model Newt */

$this->breadcrumbs=array(
	'Newts'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Newt', 'url'=>array('index')),
	array('label'=>'Create Newt', 'url'=>array('create')),
	array('label'=>'View Newt', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Newt', 'url'=>array('admin')),
);
?>

<h1>Update Newt <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>