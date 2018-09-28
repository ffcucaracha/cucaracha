<?php
/* @var $this GeoObjectsController */
/* @var $model GeoObjects */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'geo-objects-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'info'); ?>
        <?php echo $form->textField($model,'info',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'info'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'coord1'); ?>
        <?php echo $form->textField($model,'coord1',array('size'=>60,'maxlength'=>15,'readonly'=>'true')); ?>
        <?php echo $form->error($model,'coord1'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'coord2'); ?>
        <?php echo $form->textField($model,'coord2',array('size'=>60,'maxlength'=>15,'readonly'=>'true')); ?>
        <?php echo $form->error($model,'coord2'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->dropDownList($model,'type',$model->types(),array('style'=>'width:500px','required'=>'required','options' => array($model->type=>array('selected'=>true)))); ?>
        <?php echo $form->error($model,'type'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Создать'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<link rel="stylesheet" href="https://maps-js.apissputnik.ru/v0.3/sputnik_maps_bundle.min.css" />

<div id="map1" style="height: 400px" ></div>

<script src="https://maps-js.apissputnik.ru/v0.3/sputnik_maps_bundle.min.js"></script>


<script type="text/javascript">
    var map = L.sm.map('map1',{
        center: [54.94349874, 73.3862],
        zoom: 10
    });

    var myMarker = L.sm.marker([54.9434, 73.3862],{draggable:true});

    myMarker.addTo(map);

    myMarker.on('moveend',function(){
        var coord = myMarker.getLatLng()
        $("#GeoObjects_coord1").val(coord.lat.toPrecision(7));
        $("#GeoObjects_coord2").val(coord.lng.toPrecision(7));
    });
</script>