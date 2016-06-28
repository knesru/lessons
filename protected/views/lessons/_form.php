<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'lessons-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'course_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_start',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'date_finished',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'paid',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
