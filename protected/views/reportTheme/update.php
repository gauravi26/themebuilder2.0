<?php
/* @var $this ReportThemeController */
/* @var $model ReportTheme */

$this->breadcrumbs=array(
	'Report Themes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReportTheme', 'url'=>array('index')),
	array('label'=>'Create ReportTheme', 'url'=>array('create')),
	array('label'=>'View ReportTheme', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReportTheme', 'url'=>array('admin')),
);
?>

<h1>Update ReportTheme <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>