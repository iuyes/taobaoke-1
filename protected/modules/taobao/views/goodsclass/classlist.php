<div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'Cid',
		'CName',
		'Time',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>
