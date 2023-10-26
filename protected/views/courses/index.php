<?php
/* @var $this FacultyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courses',
);
$this->menu=array(
	array('label'=>'Create ', 'url'=>array('create')),
	array('label'=>'Manage ', 'url'=>array('admin')),
       


);?>



<h1>Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',

)); ?>
