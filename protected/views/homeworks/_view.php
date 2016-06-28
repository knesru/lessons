<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lesson_id')); ?>:</b>
	<?php echo CHtml::encode($data->lesson_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('task')); ?>:</b>
	<?php echo CHtml::encode($data->task); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_estimated')); ?>:</b>
	<?php echo CHtml::encode($data->time_estimated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress')); ?>:</b>
	<?php echo CHtml::encode($data->progress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('done')); ?>:</b>
	<?php echo CHtml::encode($data->done); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacher_id')); ?>:</b>
	<?php echo CHtml::encode($data->teacher_id); ?>
	<br />

	*/ ?>

</div>