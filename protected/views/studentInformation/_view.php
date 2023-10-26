<?php
/* @var $this StudentInformationController */
/* @var $data StudentInformation */
if (isset($data)) {
    // Fetch the department model based on the department_id
    $department = Departments::model()->findByPk($data->department_id);
    
    // Fetch the course model based on the course_id
    $course = Courses::model()->findByPk($data->course_id);

    // Display the department name and course name
//    echo "<b>" . CHtml::encode($data->getAttributeLabel('department_id')) . ":</b> " . CHtml::encode($department->department_name) . "<br />";
//    echo "<b>" . CHtml::encode($data->getAttributeLabel('course_id')) . ":</b> " . CHtml::encode($course->course_name) . "<br />";
}

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_id), array('view', 'id'=>$data->student_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
	<?php echo CHtml::encode($data->email_address); ?>
	<br />

	<b><?php echo "<b>" . CHtml::encode($data->getAttributeLabel('department_id')) . ":</b> " . CHtml::encode($department->department_name) . "<br />";
 ?></b>
	<?php //echo CHtml::encode($data->department_id); ?>
	<br />
        <b><?php echo "<b>" . CHtml::encode($data->getAttributeLabel('course_id')) . ":</b> " . CHtml::encode($course->course_name) . "<br />";
 
 ?></b>
	<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($data->course_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('major')); ?>:</b>
	<?php echo CHtml::encode($data->major); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_status')); ?>:</b>
	<?php echo CHtml::encode($data->academic_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theme_ID')); ?>:</b>
	<?php echo CHtml::encode($data->theme_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_contact_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_contact_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_contact_relationship')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_contact_relationship); ?>
	<br />

	
</div>