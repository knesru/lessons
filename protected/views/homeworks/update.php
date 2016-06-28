<?php
$this->breadcrumbs=array(
	'Homeworks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Homeworks','url'=>array('index')),
	array('label'=>'Create Homeworks','url'=>array('create')),
	array('label'=>'View Homeworks','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Homeworks','url'=>array('admin')),
);
?>

<h1>Update Homeworks <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>