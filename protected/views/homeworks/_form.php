<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'homeworks-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lesson_id',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'task',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'time_estimated',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'progress',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'done',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'comment',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'teacher_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
