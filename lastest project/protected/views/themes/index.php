<?php
/* @var $this ThemesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Themes',
);

$this->menu=array(
	array('label'=>'Create Themes', 'url'=>array('create')),
	array('label'=>'Manage Themes', 'url'=>array('admin')),
);
?>

<h1>Themes</h1>
<?php
// Other HTML content on your index page...

echo CHtml::link('CSS Input', array('/themes/cssinput'), array(
    'class' => 'btn btn-primary',
));

echo "<br/><br/>"; // Add line break

echo CHtml::link('Manage Themes', array('/themes/manage'), array(
    'class' => 'btn btn-primary',
));

// Other HTML content on your index page...
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
