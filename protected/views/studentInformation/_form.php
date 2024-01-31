<style>
/*    .span-19 {
 border: 2px solid #FF5733!important; border-radius: 10px!important; font-size: 16px!important; background-color: #E6F0FF!important; color: #FF9D8F!important; display: !important; border-color: #FFCFCF!important; clear: !important; position: !important; transition-property: color, background-color, border-color!important; transition-duration: 0.4s!important; transition-timing-function: ease-in-out!important;  
    
    }*/
</style>
<?php
$baseUrl = Yii::app()->baseUrl; 

/* @var $this StudentInformationController */
/* @var $model StudentInformation */
/* @var $form CActiveForm */

$departments = Departments::model()->findAll(array('order'=> 'department_name'));
$departmentList = CHtml::listData($departments,'id', 'department_name');
$courses = Courses::model()->findAll(array('order' => 'course_name'));
$courseList = CHtml::listData($courses, 'id', 'course_name');
$courseTypes = CourseType::model()->findAll(array('order' => 'course_type'));
$courseTypeList = CHtml::listData($courseTypes, 'id', 'course_type');
$themes = Themes::model()->findAll(array('order' => 'theme_name'));
$themeList = CHtml::listData($themes, 'ID', 'theme_name');

$controller = Yii::app()->getController();
 
    $actionId = $controller->getAction()->getId();
    $controllerId = $controller->getId();
//    print_r($controllerId);
//        print_r($actionId);
//
//die();

?>
<?php echo CHtml::hiddenField('controllerId',$controllerId); ?>
<?php echo CHtml::hiddenField('actionId',$actionId); ?>


<!-- Rest of your form elements -->

 
<div class="form">
    

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-information-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" id="student-id">
    <?php echo $form->labelEx($model, 'student_id'); ?>
    <?php echo $form->textField($model, 'student_id'); ?>
    <?php echo $form->error($model, 'student_id'); ?>
</div>

<div class="row" id="first-name">
    <?php echo $form->labelEx($model, 'first_name'); ?>
    <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'first_name'); ?>
</div>

<div class="row" id="last-name">
    <?php echo $form->labelEx($model, 'last_name'); ?>
    <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'last_name'); ?>
</div>

<div class="row" id="date-of-birth">
    <?php echo $form->labelEx($model, 'date_of_birth'); ?>
    <?php echo $form->textField($model, 'date_of_birth'); ?>
    <?php echo $form->error($model, 'date_of_birth'); ?>
</div>

<div class="row" id="address">
    <?php echo $form->labelEx($model, 'student_address'); ?>
    <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'address'); ?>
</div>

<div class="row" id="phone-number">
    <?php echo $form->labelEx($model, 'student_phone_number'); ?>
    <?php echo $form->textField($model, 'phone_number', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'phone_number'); ?>
</div>

<div class="row" id="email-address">
    <?php echo $form->labelEx($model, 'email_address'); ?>
    <?php echo $form->textField($model, 'email_address', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'email_address'); ?>
</div>

<div class="row" id="department-id">
    <?php echo $form->labelEx($model, 'student_department_id'); ?>
    <?php echo $form->dropDownList($model, 'department_id', $departmentList, array('empty' => 'Select Department')); ?>
    <?php echo $form->error($model, 'department_id'); ?>
</div>

<div class="row" id="course-type-id">
    <?php echo $form->labelEx($model, 'student_course_type_id'); ?>
    <?php echo $form->dropDownList($model, 'course_type_id', $courseTypeList, array('empty' => 'Select Course Type')); ?>
    <?php echo $form->error($model, 'course_type_id'); ?>
</div>

<div class="row" id="course-id">
    <?php echo $form->labelEx($model, 'student_course_id'); ?>
    <?php echo $form->dropDownList($model, 'course_id', $courseList, array('empty' => 'Select Course Name ')); ?>
    <?php echo $form->error($model, 'course_id'); ?>
</div>

<div class="row" id="major">
    <?php echo $form->labelEx($model, 'major'); ?>
    <?php echo $form->textField($model, 'major', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'major'); ?>
</div>

<div class="row" id="academic-status">
    <?php echo $form->labelEx($model, 'academic_status'); ?>
    <?php echo $form->textField($model, 'academic_status', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'academic_status'); ?>
</div>

<div class="row" id="theme-ID">
    <?php echo $form->labelEx($model, 'theme_ID'); ?>
    <?php echo $form->dropDownList($model, 'theme_ID', $themeList, array('empty' => 'Select Theme')); ?>
    <?php echo $form->error($model, 'theme_ID'); ?>
</div>

<div class="row" id="emergency-contact-name">
    <?php echo $form->labelEx($model, 'emergency_contact_name'); ?>
    <?php echo $form->textField($model, 'emergency_contact_name', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'emergency_contact_name'); ?>
</div>

<div class="row" id="emergency-contact-phone">
    <?php echo $form->labelEx($model, 'emergency_contact_phone'); ?>
    <?php echo $form->textField($model, 'emergency_contact_phone', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'emergency_contact_phone'); ?>
</div>

<div class="row" id="emergency-contact-relationship">
    <?php echo $form->labelEx($model, 'emergency_contact_relationship'); ?>
    <?php echo $form->textField($model, 'emergency_contact_relationship', array('size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'emergency_contact_relationship'); ?>
</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('id' => "student_btn")); ?>
	</div>

<?php $this->endWidget(); ?>
   

        <?php
        
?>

</div><!-- form -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function() {
  // Event handler for page load
  $(window).on('load', function() {
    var controllerName = $("#controllerId").val();
    var actionName = $("#actionId").val();

    // Make the AJAX request to fetch CSS properties
    $.ajax({
      url: 'index.php?r=formtheme/applyThemeToForms',
      type: 'GET',
      data: { controller: controllerName, action: actionName },
      dataType: 'text',
      success: function(response) {
        // Handle the success response here
        // You can access the returned CSS string from the 'response' variable

        // Apply the CSS styles to the form
        $('form').css('cssText', response);
        // Apply CSS to Page and Main Menu 
//        $('#page').css('cssText', response);
//         $('#mainmenu').css('cssText', response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the error case here
        console.error('AJAX request failed:', textStatus, errorThrown);
      }
    });
  });
});
</script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="http://localhost/testproject/AjaxFiles/ApplyCSStoElements.js"></script>
         <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/ApplythemeonformId.js"></script>



  