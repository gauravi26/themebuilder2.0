<?php
/* @var $this FacultyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Faculties',
);
$this->menu=array(
	array('label'=>'Create ', 'url'=>array('create')),
	array('label'=>'Manage ', 'url'=>array('admin')),
    	array('label'=>'Get Faculty Details Static ', 'url'=>array('getFacultyDetails')),
	array('label'=>'Get Faculty Details Dynamic', 'url'=>array('getFacultyDetailsDynamically')),
	//array('label'=>'Test ', 'url'=>array('getFacultyDetailsColumnDynamically')),

       


);?>


<h1>Faculties</h1>
<?php
// Other HTML content on your index page...

//echo CHtml::link('Faculty Details', array('/faculty/getFacultyDetails'), array(
//    'class' => 'btn btn-primary',
//));
//
//echo "<br/><br/>"; // Add line break
//
//echo CHtml::link('Faculty Details Dynamically', array('/faculty/getFacultyDetailsDynamically'), array(
//    'class' => 'btn btn-primary',
//));
//
//echo "<br/><br/>"; // Add line break
//
//echo CHtml::link('Faculty Details Column Dynamically', array('/faculty/getFacultyDetailsColumnDynamically'), array(
//    'class' => 'btn btn-primary',
//));

// Other HTML content on your index page...
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',

)); ?>
