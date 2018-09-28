<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'name',
		'info',
        'type',
        'coord1',
        'coord2',
	),
)); ?>
