<?php
/* @var $this FacultyThemeMappingController */
/* @var $data FacultyThemeMapping */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('faculty_name')); ?>:</b>
<?php echo CHtml::encode($data->faculty->faculty_name); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('theme_name')); ?>:</b>
<?php echo CHtml::encode($data->theme->theme_name); ?>
<br />


</div>
