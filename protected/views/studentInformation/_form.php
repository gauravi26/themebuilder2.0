<style>
    
    
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
<?php echo CHtml::textField('controllerId',$controllerId); ?>
<?php echo CHtml::textField('actionId',$actionId); ?>


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

	<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->textField($model,'student_id'); ?>
		<?php echo $form->error($model,'student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php echo $form->dropDownList($model,'department_id', $departmentList, array('empty'=>'Select Department')); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_type_id'); ?>
		<?php echo $form->dropDownList($model,'course_type_id', $courseTypeList, array('empty'=> 'Select Course Type')); ?>
		<?php echo $form->error($model,'course_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
		<?php echo $form->dropDownList($model,'course_id', $courseList,array('empty'=> 'Select Course Name ')); ?>
		<?php echo $form->error($model,'course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'major'); ?>
		<?php echo $form->textField($model,'major',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'major'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'academic_status'); ?>
		<?php echo $form->textField($model,'academic_status',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'academic_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'theme_ID'); ?>
		<?php echo $form->dropDownList($model,'theme_ID', $themeList, array('empty'=> 'Select Theme')); ?>
		<?php echo $form->error($model,'theme_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emergency_contact_name'); ?>
		<?php echo $form->textField($model,'emergency_contact_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'emergency_contact_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emergency_contact_phone'); ?>
		<?php echo $form->textField($model,'emergency_contact_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'emergency_contact_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emergency_contact_relationship'); ?>
		<?php echo $form->textField($model,'emergency_contact_relationship',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'emergency_contact_relationship'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
        <?php
        
//  $controller = Yii::app()->getController();
////  print_r($controller);
//// die();
//    $actionId = $controller->getAction()->getId();
//    $controllerId = $controller->getId();
//
//    $mapping = FormThemeMapping::model()->find(
//        'controller = :controller AND action = :action',
//        array(':controller' => $controllerId, ':action' => $actionId)
//    );
//    //var_dump($mapping);
//    //die();
//    if ($mapping !== null) {
//        $formId = $mapping->form_id;
//        $themeId = $mapping->theme_ID;
//
//        print_r($themeId);
//        // Fetch and apply the theme using the $themeId
//        $theme = Themes::model()->findByPk($themeId);
// if ($theme !== null) {
//        $cssStyles = [];
//        $themeAttributes = $theme->getAttributes();
//
//        foreach ($themeAttributes as $columnName => $value) {
//            $cssStyle = str_replace('_', '-', $columnName); // Replace underscore with hyphen
//            $cssStyles[] = "$cssStyle: $value";
//        }
//
//        $cssStylesString = implode('; ', $cssStyles);
//        echo '<div class="form" style="' . $cssStylesString . '"></div>';
//    } else {
//        // Handle the case when no theme is found for the given theme_ID
//    }
//        // Apply the theme logic here
//        // ...
//    } else {
//        // Handle the case when no mapping is found for the current controller and action
//        // ...
//        
//    }


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
  <script src="http://localhost/newapplication/AjaxFiles/ApplyCSStoElements.js"></script>



  