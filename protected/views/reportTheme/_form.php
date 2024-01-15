<?php
/* @var $this ReportThemeController */
/* @var $model ReportTheme */
/* @var $form CActiveForm */
$application_form = applicationForms::model()->findAll(array('order' => 'menu_form'));
$application_form_List = CHtml::listData($application_form, 'id', 'menu_form');

$report = Report::model()->findAll(array('order' => 'report_name'));
$reportList = CHtml::listData($report, 'id', 'report_name');

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-theme-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'application_forms_id'); ?>
        <?php echo $form->dropDownList($model,'application_forms_id', $application_form_List, array('prompt' => 'Select Page')); ?>
		<?php echo $form->error($model,'application_forms_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'report_name'); ?>
        <?php echo $form->dropDownList($model,'report_name', $reportList, array('prompt' => 'Select Report')); ?>
		<?php echo $form->error($model,'report_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'report_column'); ?>
		<?php echo $form->textField($model,'report_column',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'report_column'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'theme_ID'); ?>
		<?php echo $form->textField($model,'theme_ID'); ?>
		<?php echo $form->error($model,'theme_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->