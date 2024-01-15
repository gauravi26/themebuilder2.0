<?php
/* @var $this ReportThemeController */
/* @var $model ReportTheme */

$this->breadcrumbs=array(
	'Report Themes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReportTheme', 'url'=>array('index')),
	array('label'=>'Manage ReportTheme', 'url'=>array('admin')),
);
?>

<h1>Create ReportTheme</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>