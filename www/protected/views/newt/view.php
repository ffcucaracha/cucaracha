<?php
/* @var $this NewtController */
/* @var $model Newt */

$this->breadcrumbs=array(
	'Newts'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Newt', 'url'=>array('index')),
	array('label'=>'Create Newt', 'url'=>array('create')),
	array('label'=>'Update Newt', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Newt', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Newt', 'url'=>array('admin')),
);
?>

<h1>View Newt #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
