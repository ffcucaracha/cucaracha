<?php
$this->widget('CTabView', array(
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'tab 1 title',
            'view'=>'view1',
            'data'=>array('model'=>$model),
        ),
        'tab2'=>array(
            'title'=>'tab 2 title',
            'view'=>'view2',
        ),
    ),
));