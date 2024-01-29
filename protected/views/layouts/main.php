<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <style>
        
           #mainnemu ul li a    
           {
            color: black;
        }
        .nav > li > a {
            color: black;
            display: inline-block;
            padding: 10px;
            text-decoration: none;
        }
        .nav > li > a:hover {
            background-color: #f0f0f0;
        }
        .navbar-nav > li {
            float: left;
        }
        .navbar-nav {
            float: left;
        }
        .dropdown-menu > li > a {
            color: black;
            display: block;
        }
        .dropdown-menu > li > a:hover {
            background-color: #f0f0f0;
        }
             .navbar-nav > li > a {
            color: black !important; /* Set the text color to black */
        }
        .navbar-nav > li > a:hover {
            background-color: #f0f0f0;
        }
        .dropdown-menu > li > a {
            color: black !important; /* Set the text color to black */
        }
        
        
    </style>
<?php /* @var $this Controller */ 
//$formThemeMapping = new FormThemeMapping();
//$formThemeMapping->applyThemeToForms(); // Assuming 87 is the ID of the desired theme

 // Assuming 87 is the ID of the desired theme
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/ajaxFiles/CheckTime.js', CClientScript::POS_END);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/customProperties.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/texttypeproperties.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/effectScripts.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/reportTheme.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/applyReportTheme.js"></script>
       <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/ApplythemeonformId.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/applytheme.js"></script>

<!--        <script src="<?php echo Yii::app()->baseUrl; ?>/AjaxFiles/setEffects.js"></script>-->



<?php //$this->renderPartial('//FormTheme/_form_theme_apply'); ?>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<!--<script>
    $(document).ready(function() {
        $('.dropdown-toggle').click(function(e) {
            e.preventDefault();
            $(this).siblings('.dropdown-menu').slideToggle(200);
        });
    });
</script>-->
</head>
    

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

<div id="mainmenu">
   <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Test <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index.php?r=departments/index">Departments</a></li>
                    <li><a href="index.php?r=courses/index">Courses</a></li>
                    <li><a href="index.php?r=courseType/index">Course Type</a></li>
                    <li><a href="index.php?r=studentInformation/index">Student Information</a></li>
                    <li><a href="index.php?r=faculty/index">Faculty</a></li>

                </ul>
            </li>
            <li><a href="index.php?r=themes/index">Theme</a></li>
            <li><a href="index.php?r=formthememapping/index">Form Theme</a></li>
            <li><a href="index.php?r=FormElementCssPropertiesThemeMapping/getThemeDropBox">Element Properties</a></li>
            <li><a href="index.php?r=currenttheme/update&id=1">Current Theme</a></li>
             <li><a href="index.php?r=scriptCode/index">Effect Script</a></li>
            <li><a href="index.php?r=effects/index"> Apply Effect</a></li>

        </ul>
    </div>
</nav>

<!-- Include Bootstrap CSS and JS (make sure to include jQuery and Bootstrap) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div>





	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
</div>