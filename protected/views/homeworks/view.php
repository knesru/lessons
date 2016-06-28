<?php
$this->breadcrumbs=array(
	'Homeworks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Homeworks','url'=>array('index')),
	array('label'=>'Create Homeworks','url'=>array('create')),
	array('label'=>'Update Homeworks','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Homeworks','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Homeworks','url'=>array('admin')),
);
?>

<h1>View Homeworks #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'lesson_id',
		'task',
		'time_estimated',
		'progress',
		'done',
		'comment',
		'teacher_id',
	),
)); ?>
