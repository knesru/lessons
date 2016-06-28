<?php
$this->breadcrumbs=array(
	'Homeworks',
);

$this->menu=array(
	array('label'=>'Create Homeworks','url'=>array('create')),
	array('label'=>'Manage Homeworks','url'=>array('admin')),
);
?>

<h1>Homeworks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
