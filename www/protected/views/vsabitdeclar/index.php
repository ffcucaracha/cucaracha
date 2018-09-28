<?php


$this->menu=array(
	array('label'=>'Список абитуриентов', 'url'=>array(($type_search == "1")? '/vsabiturient/admin':'/vPOSINFOa/admin')),
	array('label'=>'Личные данные', 'url'=>array('/vsabiturient/view', 'id'=>$id_abit, 'type_search'=>$type_search)),
	array('label'=>'Телефоны', 'url'=>array('/vsabitphone/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Адреса', 'url'=>array('/vsabitaddress/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Документы', 'url'=>array('/vsabitdocumentsa/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Документы(студент)', 'url'=>array('/vsabitdocuments/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Заявления', 'url'=>array('/vsabitdeclar/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Результаты сдачи', 'url'=>array('/vsabitpredm/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Окончательные оценки', 'url'=>array('/vabitdeclres/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Преимущества', 'url'=>array('/abitprivlist/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Договоры', 'url'=>array('/vdoginfo/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
	array('label'=>'Приказы', 'url'=>array('/abitorderweb/index', 'id'=>$id_abit, 'cod'=>$cod_abit, 'title'=>$title_abit, 'date_out'=>$date_out_abit, 'date_priv'=>$date_priv, 'type_search'=>$type_search)),
 
);

?>
<div class="col-sm-8">
<h3><?php echo $title_abit; ?>  </h3> <var><span style="color: red;"><?php echo $date_out_abit; ?><span style="color: green;"><?php echo $date_priv; ?></span></var>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search2($id_abit),
    'summaryText' => 'Заявления', // текст перед таблицей
    'pager'=>'LinkPager',
    'enableHistory'=>true,
    'columns' => array(
            array(
            'name' => 'REITING',
            'header' => '',
            'type' => 'raw',
            'value' => '$data->REITING',
            ),
            array(
            'name'=>'position',
            'header' => 'ФО',
            'type' => 'raw',
            'value'=>'$data->getFO($data->position->STUDY_FORM)',
            'sortable'=>true,
            ),
            array(
            'name'=>'position',
            'header' => 'Направление/ Специальность',
            'type' => 'raw',
            'value'=>'($data->position->SPEC_NAME2 != "") ? $data->position->SPEC_NAME2 : $data->position->SPEC_NAME',
            'sortable'=>true,
            ),
            array(
            'name'=>'position',
            'header' => 'Уровень',
            'type' => 'raw',
            'value'=>'$data->position->U_VUZ_SHORT',
            'sortable'=>true,
            ),
            array(
            'name'=>'position',
            'header' => 'Тип стандарта',
            'type' => 'raw',
            'value'=>'($data->position->TYPE_STANDARD2 != "") ? $data->position->TYPE_STANDARD2 : $data->position->TYPE_STANDART',
            'sortable'=>true,
            ),
            array(
            'name'=>'position',
            'header' => 'Профиль/ Специализация',
            'type' => 'raw',           
            'value'=>'($data->position->SPEC_NAME2 != "") ? $data->position->SPEC_NAME : ""',
            'sortable'=>true,
            ),
            array(
            'name'=>'position',
            'header' => 'Финанс.',
            'type' => 'raw',
            'value'=>'$data->getPozitionType($data->position->POSITION_TYPE)',
            'sortable'=>true,
            ),
            array(
            'name' => 'CEL_CODE',
            'header' => 'Квота',
            'type' => 'raw',
            'sortable' => false,
            'value' => '$data->CEL_CODE',
            ),
            array(
            'name' => 'DATE_DECLAR',
            'header' => 'Дата подачи',
            'type' => 'raw',
            'sortable' => false,
            'value' => '$data->DATE_DECLAR',
            ),

            array(
            'header' => 'Предметы',
            'type' => 'raw',
            'value' => '$data->getPredms($data->ID)',
            ),  
            
        ),
     'rowHtmlOptionsExpression'=>array($model,'getStyleRow'),
    
));
?>
    </div>