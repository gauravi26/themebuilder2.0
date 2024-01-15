<?php
/* @var $this FacultyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Departments',
);
$this->menu=array(
	array('label'=>'Create ', 'url'=>array('create')),
	array('label'=>'Manage ', 'url'=>array('admin')),


);?>


<h1>Departments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',

)); ?>
<style>
 .student-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 16px;
      justify-content: center;
      align-items: center;
      background-color:  #F0FCFF;
      border-radius: 12px;
      padding: 12px;
      font-family: Lato;
      max-width: 750px;
      margin: 0 auto;
    }

    .student-container h2 {
      text-align: center;
      grid-column: span 4;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 16px;
    }

    th, td {
      padding: 12px;
      border: 2px dotted;
    }

    th {
      background-color: #87CEEB;
    }

    tr:nth-child(even) {
      background-color: #F0F8FF;
    }

    tr:hover {
      background-color: #B0E0E6;
    }

    @media (max-width: 768px) {
      .student-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
</head>
<body>
  <div class="student-container">
    <h2>HTML TABLE</h2>
    <table class="student-report">
      <thead>
        <tr>
          <th>Roll No.</th>
          <th>Name</th>
          <th>English</th>
          <th>Maths</th>
          <th>Science</th>
          <th>Computer Science</th>
          <th>Social Studies</th>
          <th>Percent %</th> <!-- Added Total column -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>01</td>
          <td>Ali</td>
          <td>86</td>
          <td>77</td>
          <td>87</td>
          <td>92</td>
          <td>95</td>
          <td>30</td> <!-- Placeholder for Total column -->
        </tr>
        <tr>
          <td>02</td>
          <td>Salman</td>
          <td>86</td>
          <td>77</td>
          <td>87</td>
          <td>92</td>
          <td>95</td>
          <td>45</td> <!-- Placeholder for Total column -->
        </tr>
        <tr>
          <td>03</td>
          <td>Shan</td>
          <td>86</td>
          <td>77</td>
          <td>87</td>
          <td>92</td>
          <td>95</td>
          <td>89</td> <!-- Placeholder for Total column -->
        </tr>
        <tr>
          <td>04</td>
          <td>Aliyan</td>
          <td>86</td>
          <td>77</td>
          <td>87</td>
          <td>92</td>
          <td>95</td>
          <td>37</td> <!-- Placeholder for Total column -->
        </tr>
        <tr>
          <td>05</td>
          <td>Zeeshan</td>
          <td>86</td>
          <td>77</td>
          <td>87</td>
          <td>92</td>
          <td>95</td>
          <td>95</td> <!-- Placeholder for Total column -->
        </tr>
      </tbody>
      <!-- Footer (You can uncomment this if needed)
      <tfoot>
        <tr>
          <td colspan=3>Maximum Marks: </td>
          <td colspan=3>Marks Obtained: </td>
          <td colspan=3>Grade: </td>
        </tr>
      </tfoot>
      -->
    </table>
  </div>
</body>
</html>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get all elements with class 'percentage' in the table
    var percentageElements = document.querySelectorAll('table td:nth-child(8)');

    // Loop through each percentage element
    percentageElements.forEach(function (element) {
      // Get the percentage value as an integer
//      element.style.fontFamily = 'Arial, sans-serif';
//    element.style.color = 'blue';
//    element.style.backgroundColor = '#FFFFCC';
//    element.style.border = '1px solid #999';
//    element.style.transition = 'color 3s ease-in-out';
//    element.style.textAlign = 'center';
      var percentage = parseInt(element.textContent);

      // Change the color based on the percentage value
      if (percentage >= 45) {
        element.style.color = 'green';
      } else {
        element.style.color = 'red';
      }
    });
  });
</script>
