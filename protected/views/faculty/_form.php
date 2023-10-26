<?php
/* @var $this FacultyController */
/* @var $model Faculty */
/* @var $form CActiveForm */
$departments = Departments::model()->findAll(array('order' => 'department_name'));
$departmentList = CHtml::listData($departments, 'id', 'department_name');
$courses = Courses::model()->findAll(array('order' => 'course_name'));
$courseList = CHtml::listData($courses, 'id', 'course_name');

$controller = Yii::app()->getController();
//  print_r($controller);
// die();
    $actionId = $controller->getAction()->getId();
    $controllerId = $controller->getId();


 echo CHtml::textField('controllerId',$controllerId); 
 echo CHtml::textField('actionId',$actionId); 




?>
<style>


div.form input[type="checkbox"]{
    
        height: 30px;
        color: red;
}

/* body{
    
    font-size: 20px;
    color: black;
}*/
</style>
<!DOCTYPE>
<div class="form" >
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'faculty-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'faculty_name'); ?>
		<?php echo $form->textField($model,'faculty_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'faculty_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faculty_code'); ?>
		<?php echo $form->textField($model,'faculty_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'faculty_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
                <?php echo $form->dropDownList($model, 'department_id', $departmentList, array('empty'=>'Select Department')); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

<div class="row">
    Course Type <br> <?php  //echo CHtml::labelEx('course_type_id'); ?>
	<?php 
		// Get the list of course types from the database
		$courseTypes = CourseType::model()->findAll();
		
		// Loop through the course types and create a checkbox for each one
		foreach($courseTypes as $type) {
			echo CHtml::checkBox('course_type_id[]','', array('value' => $type->id, 'uncheckValue' => null)) . ' ' . $type->course_type . '<br>';
		}
	?>
	<?php echo $form->error($model,'course_type_id'); ?>
</div>


	<div class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
                <?php echo $form->dropDownList($model, 'course_id',$courseList, array('empty'=>'Select Course')); ?>
		<?php echo $form->error($model,'course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
            


	<div class="row buttons" >
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>
        <?php   
       $controller = Yii::app()->getController();
    $actionId = $controller->getAction()->getId();
    $controllerId = $controller->getId();

    $mapping = FormThemeMapping::model()->find(
        'controller = :controller AND action = :action',
        array(':controller' => $controllerId, ':action' => $actionId)
    );
    //var_dump($mapping);
    if ($mapping !== null) {
        $formId = $mapping->form_id;
        $themeId = $mapping->theme_ID;

        // Fetch and apply the theme using the $themeId
        $theme = Themes::model()->findByPk($themeId);

        // Apply the theme logic here
        // ...
    } else {
        // Handle the case when no mapping is found for the current controller and action
        // ...
    
    }?>

</div><!-- form -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script>
$(document).ready(function() {
  // Event handler for page load
  
  //alert("hiu");
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
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the error case here
        console.error('AJAX request failed:', textStatus, errorThrown);
      }
    });
  });
});
</script>

  <script src="http://localhost/testproject/AjaxFiles/ApplyCSStoElements.js"></script>
    <script src="http://localhost/testproject/AjaxFiles/texttypeproperties.js"></script>


<!--<script>
    // Function to merge and apply CSS styles to the form
function applyMergedStyles(elementCSS, textCSS) {
  // Remove unnecessary characters and spaces
  textCSS = textCSS.replace(/"/g, '').trim();

  // Split the textCSS into individual rules
  var rules = textCSS.split('}');

  // Remove any empty strings from the array
  rules = rules.filter(function(rule) {
    return rule.trim().length > 0;
  });

  // Append the elementCSS
  var mergedCSS = elementCSS + ';';

  // Append the textCSS rules
  for (var i = 0; i < rules.length; i++) {
    mergedCSS += '\n' + rules[i] + '}';
  }

  // Apply the merged CSS styles to the form
  $('form').attr('style', mergedCSS);
}

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
        // Log the response in the console
        console.log('Text CSS Properties:', response);

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
});
</script>-->




<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        
       // alert("hi");
  // Event handler for page load
  $(window).on('load', function() {
    // Make the AJAX request to fetch CSS properties
    $.ajax({
      url: 'index.php?r=formtheme/applyThemeForms',
      type: 'GET',
      dataType: 'text',
      success: function(response) {
        // Handle the success response here
        // You can access the returned CSS string from the 'response' variable
        
        // Apply the CSS styles to the form
        $('form').css('cssText', response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle the error case here
        console.error('AJAX request failed:', textStatus, errorThrown);
      }
    });
  });
});
</script>-->
<!--<script>
$(document).ready(function() {
    // Event handler for page load
    $(window).on('load', function() {
        // Make the AJAX request to fetch CSS properties
        $.ajax({
            url: 'index.php?r=formtheme/elementCssProperties',
            type: 'GET',
            dataType: 'text',
            success: function(response) {
                // Handle the success response here
                // You can access the returned CSS string from the 'response' variable

                // Create a <style> element and append the CSS styles to it
                var styleElement = $('<style>').text(response);
                $('head').append(styleElement);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error case here
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
    });
});
</script>-->
<!--<script>
    $(document).ready(function() {
    // Event handler for page load
    $(window).on('load', function() {
        // Make the AJAX request to fetch the theme mapping
        $.ajax({
            url: 'index.php?r=formtheme/applyThemeToForms',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Handle the success response here
                // You can access the returned mapping data from the 'response' variable

                // Call the function to apply the theme using the mapping data
                applyThemeToForms(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error case here
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
    });
});

function applyThemeToForms(mapping) {
    // Check if mapping is available
    if (mapping !== null) {
        var formId = mapping.form_id;
        var themeId = mapping.theme_id;

        // Fetch and apply the theme using the themeId
        var themeUrl = 'index.php?r=formtheme/fetchTheme&theme_id=' + themeId;

        // Make the AJAX request to fetch the theme data
        $.ajax({
            url: themeUrl,
            type: 'GET',
            dataType: 'json',
            success: function(theme) {
                // Handle the success response here
                // You can access the returned theme data from the 'theme' variable

                // Apply the theme logic here
                // ...
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error case here
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
    } else {
        // Handle the case when no mapping is found for the current controller and action
        print_r('Not Found');
    }
}

    </script>-->


