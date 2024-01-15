<?php
/* @var $this ReportThemeController */
/* @var $model ReportTheme */

$this->breadcrumbs=array(
	'Report Themes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReportTheme', 'url'=>array('index')),
	array('label'=>'Create ReportTheme', 'url'=>array('create')),
	array('label'=>'Update ReportTheme', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReportTheme', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReportTheme', 'url'=>array('admin')),
);
?>

<h1>View ReportTheme #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'application_forms_id',
		'report_name',
		'report_column',
		'theme_ID',
	),
)); ?>
