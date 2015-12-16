<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form blockType formField">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row typeText">
		<?php echo $form->labelEx($model,'event_title'); ?>
		<?php echo $form->textField($model,'event_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_title'); ?>
	</div>

	<div class="row typeText typeTextArea">
		<?php echo $form->labelEx($model,'event_description'); ?>
		<br>
		<?php echo $form->textArea($model,'event_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'event_description'); ?>
	</div>

	<div class="row imageUpload">
		<?php echo $form->labelEx($model, 'image') ?>
		<?php echo $form->fileField($model, 'image')?>
		<?php echo $form->error($model, 'image') ?> 
	</div>
	<div class="row typeText">
		<?php echo $form->labelEx($model,'event_x'); ?>
		<?php echo $form->textField($model,'event_x',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'event_x'); ?>
	</div>
	<div class="row typeText">
		<?php echo $form->labelEx($model,'event_y'); ?>
		<?php echo $form->textField($model,'event_y',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'event_y'); ?>
	</div>
	<div class="row typeText">
		<?php echo $form->labelEx($model,'event_date'); ?>
		<?php echo $form->textField($model,'event_date',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>

	<div class="row buttons buttonInForm">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->