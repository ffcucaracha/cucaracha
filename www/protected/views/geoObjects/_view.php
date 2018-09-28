<?php
/* @var $this GeoObjectsController */
/* @var $data GeoObjects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coord1')); ?>:</b>
	<?php echo CHtml::encode($data->coord1); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('coord2')); ?>:</b>
    <?php echo CHtml::encode($data->coord2); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('info')); ?>:</b>
	<?php echo CHtml::encode($data->info); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
    <?php echo CHtml::encode($data->info); ?>
    <br />

</div>