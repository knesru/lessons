<?php
$this->breadcrumbs=array(
	'Lessons',
);

$this->menu=array(
	array('label'=>'Create Lessons','url'=>array('create')),
	array('label'=>'Manage Lessons','url'=>array('admin')),
);
?>

<h1>Lessons</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
