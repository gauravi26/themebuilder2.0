<?php
/* @var $this CoursesController */
/* @var $model Courses */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Courses', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),
	array('label'=>'Update Course', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Course', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);
?>

<h1>View Course #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_name',
		'course_link',
		'department_id',
		'course_type_id',
	),
)); ?>
