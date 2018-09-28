<?php
/* @var $this GeoObjectsController */
/* @var $model GeoObjects */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#geo-objects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<p>
    В начале каждого Вашего поиска значений можно ввести оператор сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>), чтобы указать, как сравнение должно быть сделано.
</p>
<p>
    Для пересортировки данных щелкните мышкой по соответствующему заголовку столбца таблицы.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'geo-objects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'coord1',
        'coord2',
        'name',
		'info',
        'type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
