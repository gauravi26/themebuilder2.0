<?php
/* @var $this ReportThemeController */
/* @var $model ReportTheme */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_forms_id'); ?>
		<?php echo $form->textField($model,'application_forms_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'report_name'); ?>
		<?php echo $form->textField($model,'report_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'report_column'); ?>
		<?php echo $form->textField($model,'report_column',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'theme_ID'); ?>
		<?php echo $form->textField($model,'theme_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->