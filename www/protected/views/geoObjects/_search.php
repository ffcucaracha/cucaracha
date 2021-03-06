<?php
/* @var $this GeoObjectsController */
/* @var $model GeoObjects */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coord1'); ?>
		<?php echo $form->textField($model,'coord1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model,'coord2'); ?>
        <?php echo $form->textField($model,'coord2',array('size'=>60,'maxlength'=>100)); ?>
    </div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'info'); ?>
		<?php echo $form->textField($model,'info',array('size'=>60,'maxlength'=>200)); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model,'type'); ?>
        <?php echo $form->textField($model,'info',array('size'=>60,'maxlength'=>200)); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->