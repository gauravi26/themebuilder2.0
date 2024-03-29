<?php
/* @var $this CssPropertiesController */
/* @var $model CssProperties */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'css-properties-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'property_name'); ?>
		<?php echo $form->textField($model,'property_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'property_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'property_value'); ?>
		<?php echo $form->textField($model,'property_value',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'property_value'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->