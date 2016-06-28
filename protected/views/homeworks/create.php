<?php
$this->breadcrumbs=array(
	'Homeworks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Homeworks','url'=>array('index')),
	array('label'=>'Manage Homeworks','url'=>array('admin')),
);
?>

<h1>Create Homeworks</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>