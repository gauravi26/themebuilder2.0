<?php
/* @var $this CoursesController */
/* @var $model Courses */
/* @var $form CActiveForm */
$departments = Departments::model()->findAll(array('order' => 'department_name'));
$departmentList = CHtml::listData($departments, 'id', 'department_name');
//$coursetype= CourseType::model()->findAll(array('order'=> 'course_type'));

//$CourseType = CHtml::listData($course_type, 'id', 'course_type_id');

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_name'); ?>
		<?php echo $form->textField($model,'course_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'course_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_link'); ?>
		<?php echo $form->textField($model,'course_link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'course_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
                <?php echo $form->dropDownList($model, 'department_id', $departmentList, array('empty'=>'Select Department')); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

<div class="row">
    <?php echo $form->labelEx($model,'course_type_id'); ?>
    <?php
        // get the list of course types
        $courseTypes = CourseType::model()->findAll();
        $courseTypeList = CHtml::listData($courseTypes, 'id', 'course_type');
        
        // display the radio buttons for course types
        foreach($courseTypeList as $value=>$name){
            echo CHtml::radioButton('Courses[course_type_id]', $model->course_type_id == $value, array('value'=>$value, 'id'=>'course_type_id_'.$value));
            echo CHtml::label($name, 'course_type_id_'.$value);

        }
    ?>
    <?php echo $form->error($model,'course_type_id'); ?>
</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->