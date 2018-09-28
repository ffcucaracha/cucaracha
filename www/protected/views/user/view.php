<?php
/* @var $this UserController */
/* @var $model User */
/* просмотр пользователя */

$this->breadcrumbs=array(
	'Пользователь'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Пользователь №<?php echo $model->id; ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'region',
		'email',
	),
)); */

 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
    'id',
    'username',
    ),
    ));
  
  ?>
