<?php
/* @var $this ReportThemeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Report Themes',
);

$this->menu=array(
	array('label'=>'Create ReportTheme', 'url'=>array('create')),
	array('label'=>'Manage ReportTheme', 'url'=>array('admin')),
);
?>

<h1>Report Themes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
