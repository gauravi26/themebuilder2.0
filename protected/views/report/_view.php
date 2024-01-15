<?php
/* @var $this ReportController */
/* @var $data Report */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_name')); ?>:</b>
	<?php echo CHtml::encode($data->report_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_table_id')); ?>:</b>
	<?php echo CHtml::encode($data->report_table_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_grid_container_id')); ?>:</b>
	<?php echo CHtml::encode($data->report_grid_container_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />


</div>