<?php
/* @var $this CourseTypeController */
/* @var $data CourseType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_type')); ?>:</b>
	<?php echo CHtml::encode($data->course_type); ?>
	<br />


</div>