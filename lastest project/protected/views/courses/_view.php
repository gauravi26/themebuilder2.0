<?php
/* @var $this CoursesController */
/* @var $data Courses */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_name')); ?>:</b>
	<?php echo CHtml::encode($data->course_name); ?>
	<br />
        
        <p><strong>Course Type:</strong> <?php echo $data->course_type->course_type; ?></p>



	    <p>Department: <?php echo $data->department->department_name; ?></p>




</div>