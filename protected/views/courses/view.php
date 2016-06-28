<?php
$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Courses','url'=>array('index')),
	array('label'=>'Create Courses','url'=>array('create')),
	array('label'=>'Update Courses','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Courses','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courses','url'=>array('admin')),
);
?>

<h1>View Courses #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'start_date',
		'end_date',
		'owner_user_id',
		'create_date',
		'status',
		'price_by',
		'price',
		'previous_course_id',
	),
)); ?>
