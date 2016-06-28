<?php
$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
	array('label'=>'Create Courses','url'=>array('create')),
	array('label'=>'Manage Courses','url'=>array('admin')),
);
?>

<h1>Courses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
