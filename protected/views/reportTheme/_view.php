<?php
/* @var $this ReportThemeController */
/* @var $data ReportTheme */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('application_forms_id')); ?>:</b>
	<?php echo CHtml::encode($data->application_forms_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_name')); ?>:</b>
	<?php echo CHtml::encode($data->report_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_column')); ?>:</b>
	<?php echo CHtml::encode($data->report_column); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theme_ID')); ?>:</b>
	<?php echo CHtml::encode($data->theme_ID); ?>
	<br />


</div>