<?php
/* @var $this CourseTypeController */
/* @var $model CourseType */

$this->breadcrumbs=array(
	'Course Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CourseType', 'url'=>array('index')),
	array('label'=>'Create CourseType', 'url'=>array('create')),
	array('label'=>'View CourseType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CourseType', 'url'=>array('admin')),
);
?>

<h1>Update CourseType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>