<style>
/*   body h1 {
    color: green;
}
 body h1 {
    font-size: 30px;
}
body {
    color: blue;
}
body {
    font-size: 12;
}
body {
    background-color: coral;
} */
/*   .highlight 
{       
    border: 3px solid #FBB72D;
    font-weight: bold;
    border-radius: 5px;
}

.highlighted 
{       
    border: 3px solid #000000;
    font-weight: bold;
    border-radius: 5px;
}*/
	 

</style><?php
/* @var $this DepartmentsController */
/* @var $model Departments */
/* @var $form CActiveForm */
//$this->applyThemeToForms();
$controller = Yii::app()->getController();
 
    $actionId = $controller->getAction()->getId();
    $controllerId = $controller->getId();
   Yii::app()->clientScript->registerScript('setEffectKey', '
    sessionStorage.setItem("selectedEffectKey", "blink");
');


?>
<!--<style>
    
    body {
    font-size: 12px;
    color: green;
    font-family: Courier New, Courier, monospace;
    text-align: left;
    text-decoration: none;
}
h1 {
    font-size: 30px;
    color: #ce5555;
    font-family: Alumni Sans;
    text-align: center;
    text-decoration: overline;
}

</style>-->

<div class="form">
    <?php echo CHtml::textField('controllerId',$controllerId); ?>
<?php echo CHtml::textField('actionId',$actionId); ?>

<?php Yii::app()->clientScript->registerCoreScript('yiiactiveform'); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'departments-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
         'enableAjaxValidation'=>false,
         'clientOptions'=>array(
                    /* name=>value pairs */
                         'validateOnSubmit'=>true,
                         'validateOnChange'=>false,
                     
                    )
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'department_code'); ?>
		<?php echo $form->textField($model,'department_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'department_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_name'); ?>
		<?php echo $form->textField($model,'department_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'department_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_desc'); ?>
		<?php echo $form->textField($model,'department_desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'department_desc'); ?>
        </div>    
	<div class="row buttons">
          <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('id' => 'btn')); ?>
	</div>
<div>
    <table id="departmentTable">
  <thead>
    <tr>
      <th>Department Name</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table></div>


               
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery library -->
<script>
$(document).ready(function() {
    // Event handler for page load
    $(window).on('load', function() {
        var controllerName = $("#controllerId").val();
        var actionName = $("#actionId").val();

        $.ajax({
            url: 'index.php?r=formtheme/applyEffect&controller=' + controllerName + '&action=' + actionName,
            method: 'GET',
            success: function (response) {
                // Log the response for debugging
                console.log(response);

                try {
                    // Extract JSON part by removing leading and trailing characters
                    var jsonStart = response.indexOf('{');
                    var jsonEnd = response.lastIndexOf('}');
                    var trimmedResponse = response.substring(jsonStart, jsonEnd + 1);
                    var selectedEffectConfig = JSON.parse(trimmedResponse);

                    if (selectedEffectConfig.js && selectedEffectConfig.css) {
                        // Apply the CSS styles
                        var styleElement = document.createElement('style');
                        styleElement.type = 'text/css';
                        styleElement.appendChild(document.createTextNode(selectedEffectConfig.css));
                        document.head.appendChild(styleElement);

                        // Dynamically generate the JavaScript code based on the selected effect
                        var dynamicScript = selectedEffectConfig.js;

                        // Create a new script element
                        var scriptElement = document.createElement('script');
                        scriptElement.type = 'text/javascript';
                        scriptElement.innerHTML = dynamicScript;

                        // Append the script element to the body to execute the JavaScript code
                        document.body.appendChild(scriptElement);
                    } else {
                        console.log('Invalid response format. The response should contain "js" and "css" properties.');
                    }
                } catch (error) {
                    console.log('Error parsing response as JSON:', error);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });
});
</script>


</body>
</html>



<?php $this->endWidget(); ?>  
        
        </div><!-- form -->

    	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
<!--     <script>
$(document).ready(function() {
    // Event handler for page load
    $(window).on('load', function() {
        var controllerName = $("#controllerId").val();
        var actionName = $("#actionId").val();

        // Make the AJAX request to fetch CSS properties
        $.ajax({
            url: 'index.php?r=formtheme/customProperties',
            type: 'GET',
            data: { controllerId: controllerName, actionId: actionName },
            dataType: 'text',
            success: function(response) {
                // Modify the CSS styles to target body h1
                response = response.replace(/h1\s*{/g, ' h1 {');

                console.log('Applying Text CSS Properties:', response);

                // Create a style element and append modified CSS styles to head
                var styleElement = document.createElement('style');
                styleElement.type = 'text/css';
                styleElement.appendChild(document.createTextNode(response));
                document.head.appendChild(styleElement);

                // Call a function to apply the CSS styles to the form
                applyTextCSSStyles(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error case for fetching CSS properties
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
    });

    function applyTextCSSStyles(cssText) {
        // Modify the CSS styles to target body h1
        cssText = cssText.replace(/h1\s*{/g, 'body h1 {');

        console.log('Applying Text CSS Properties:', cssText);

        var styleElement = document.createElement('style');
        styleElement.type = 'text/css';
        styleElement.appendChild(document.createTextNode(cssText));
        document.head.appendChild(styleElement);
    }
});
</script>-->

 <script>
//$(document).ready(function() {
//  // Event handler for page load
//  $(window).on('load', function() {
//    var controllerName = $("#controllerId").val();
//    var actionName = $("#actionId").val();
//
//    // Make the AJAX request to fetch CSS properties
//    $.ajax({
//      url: 'index.php?r=formtheme/applyThemeToForms',
//      type: 'GET',
//      data: { controller: controllerName, action: actionName },
//      dataType: 'text',
//      success: function(response) {
//
//        // Handle the success response here
//        // You can access the returned CSS string from the 'response' variable
//
//        // Apply the CSS styles to the form
//        $('form').css('cssText', response);
//        
//      },
//      error: function(jqXHR, textStatus, errorThrown) {
//        // Handle the error case here
//        console.error('AJAX request failed:', textStatus, errorThrown);
//      }
//    });
//  });
//});
</script>
        
        

   <script>
$(document).ready(function() {
   $('#Departments_department_code').blur(function(){
       
       
     // var departmentCode = $(this).val();
      
      $.ajax({
      url: 'index.php?r=departments/checkDeptCode&department_code=',
         data: { department_code: $(this).val() },
         type: 'get',
         dataType: 'json',
        success:function(response){
                  // alert(response);
            if(response){
             alert(JSON.stringify(response));
                    
               // Department code is available, get the department name and description
               var departmentName = response.name;
               var departmentDesc = response.description;
                // $('#response').text(JSON.stringify(response));
var newRow = '<tr><td>' + departmentName + '</td><td>' + departmentDesc + '</td></tr>';
      $('#departmentTable tbody').empty();
    $('#departmentTable tbody').append(newRow);
  
        // append row to table

              
            }else{
                                          // alert("response");



               // Department code is not available, display message
            // alert('Department code already exists');
            }
         }
      });
   });  
});


</script>
</div><!-- form -->

<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->


  <script src="http://localhost/newproject/AjaxFiles/ApplyCSStoElements.js"></script>



