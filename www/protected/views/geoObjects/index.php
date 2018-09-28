<?php
/* @var $this GeoObjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geo Objects',
);

$this->menu=array(
	array('label'=>'Create GeoObjects', 'url'=>array('create')),
	array('label'=>'Manage GeoObjects', 'url'=>array('admin')),
);
?>

<h1>Geo Objects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
