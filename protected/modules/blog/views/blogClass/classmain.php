<div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'Fid',
		'Cid',
		'ClassName',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
  </div>
