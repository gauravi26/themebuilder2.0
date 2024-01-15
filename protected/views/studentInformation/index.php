 <style>
    /* Grid Container Properties */
    .student-container {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-gap: 8px; /* Adjusted gap */
      justify-items: center;
      align-items: center;
      background-color: #fff;
      border: 1px solid #ddd;
      padding: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow for a subtle elevation */
      border-radius: 5px; /* Added border-radius for a softer appearance */
    }

    /* Grid Item Properties */
    .student-item {
      border: 1px solid #3498db;
      padding: 12px;
      background-color: #ecf0f1;
      text-align: center;
      font-weight: bold;
      margin: 0;
    }

    .student-item:nth-child(odd) {
      background-color: #3498db;
      color: #fff;
    }

  
  </style>
      
      <?php
/* @var $this StudentInformationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Student Informations',
);

$this->menu=array(
	array('label'=>'Create StudentInformation', 'url'=>array('create')),
	array('label'=>'Manage StudentInformation', 'url'=>array('admin')),
    	array('label'=>'View Studnent Details', 'url'=>array('getStudentDetails')),

);
?>

<h1>Student Informations</h1>

<?php
// Other HTML content on your index page...

//echo CHtml::link('Get Student Details', array('/studentInformation/getStudentDetails'), array(
//    'class' => 'btn btn-primary',
//));

// Other HTML content on your index page...
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
<body>
  <h2>Student Report</h2>

  <div class="student-container" id="student-details">
    <div class="student-item"><strong>Student Name</strong></div>
    <div class="student-item"><strong>Student ID</strong></div>
    <div class="student-item"><strong>Math Grade</strong></div>
    <div class="student-item"><strong>Science Grade</strong></div>
    <div class="student-item"><strong>English Grade</strong></div>
    <div class="student-item"><strong>Overall GPA</strong></div>

    <div class="student-item">John Doe</div>
    <div class="student-item">12345</div>
    <div class="student-item">90</div>
    <div class="student-item">85</div>
    <div class="student-item">95</div>
    <div class="student-item">6</div>
    
    <div class="student-item">Jane Smith</div>
    <div class="student-item">67890</div>
    <div class="student-item">88</div>
    <div class="student-item">92</div>
    <div class="student-item">78</div>
    <div class="student-item">8.8</div>
    
    <div class="student-item">Bob Johnson</div>
    <div class="student-item">54321</div>
    <div class="student-item">75</div>
    <div class="student-item">80</div>
    <div class="student-item">85</div>
    <div class="student-item">3.0</div>
    
      <div class="student-item">Jonny</div>
    <div class="student-item">3463</div>
    <div class="student-item">5</div>
    <div class="student-item">8</div>
    <div class="student-item">18</div>
    <div class="student-item">2</div>
    <!-- Add more grid items for other students -->
  </div>
</body>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get all elements with class 'student-item' containing Overall GPA
    var overallGPAElements = document.querySelectorAll('.student-item:nth-child(6n+6)');

    // Loop through each Overall GPA element
    overallGPAElements.forEach(function (element) {
      // Get the GPA value as a floating-point number
      var gpa = parseFloat(element.textContent);

      // Change the color based on the GPA value
      if (gpa < 4) {
        element.style.color = 'red';
      } else {
        element.style.color = 'green';
      }
    });
  });
</script>
