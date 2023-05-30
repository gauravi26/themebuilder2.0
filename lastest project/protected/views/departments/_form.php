<?php
/* @var $this DepartmentsController */
/* @var $model Departments */
/* @var $form CActiveForm */
?>

<div class="form">
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
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


               



<?php $this->endWidget(); ?>   
    	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        

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
