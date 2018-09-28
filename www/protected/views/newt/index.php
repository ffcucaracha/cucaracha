<?php
/* @var $this NewtController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Newts',
);

$this->menu=array(
	array('label'=>'Create Newt', 'url'=>array('create')),
	array('label'=>'Manage Newt', 'url'=>array('admin')),
);
?>

<h1>Newts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
