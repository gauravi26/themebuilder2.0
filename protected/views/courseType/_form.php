<style>
    
    
    #id {
        color: white;
    }
    
    
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
<div id="hide">
<?php echo CHtml::hiddenField('controllerId',$controllerId); ?>
<?php echo CHtml::hiddenField('actionId',$actionId); ?>

</div>
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
    
    <input type="text" id="baseUrl" name="baseUrl" value="<?php echo $baseUrl?>">

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
          <div class="row" id = "course_type">
    <?php echo $form->labelEx($model, 'course_type'); ?>
    <?php echo $form->textField($model, 'course_type', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'course_type'); ?>
  </div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save' ,array('id' => "course_type_btn")); ?>
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

    // Variables to store the CSS styles
    var elementCSS = '';
    var textCSS = '';

    // First AJAX request to fetch element CSS properties
    $.ajax({
      url: 'index.php?r=formtheme/applyThemeToForms',
      type: 'GET',
      data: { controller: controllerName, action: actionName },
      dataType: 'text',
      success: function(response) {
        // Handle the success response here
        elementCSS = response;

        // Apply the merged CSS styles to the form
        applyMergedStyles(elementCSS, textCSS);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the error case here
        console.error('AJAX request for element CSS failed:', textStatus, errorThrown);
      }
    });

    // Second AJAX request to fetch text CSS properties
    $.ajax({
      url: 'index.php?r=formtheme/textCSSProperties',
      type: 'GET',
      data: { controller: controllerName, action: actionName },
      dataType: 'text',
      success: function(response) {
        // Handle the success response here
        textCSS = response;

        // Apply the merged CSS styles to the form
        applyMergedStyles(elementCSS, textCSS);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the error case here
        console.error('AJAX request for text CSS failed:', textStatus, errorThrown);
      }
    });
  });

  // Function to merge and apply CSS styles to the form
  function applyMergedStyles(elementCSS, textCSS) {
    // Merge CSS styles from both requests
    var mergedCSS = elementCSS + '; ' + textCSS;

    // Apply the merged CSS styles to the form
    $('form').css('cssText', mergedCSS);
  }
});
</script>

  <script src="http://localhost/testproject/AjaxFiles/ApplyCSStoElements.js"></script>
         <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/ApplythemeonformId.js"></script>



  