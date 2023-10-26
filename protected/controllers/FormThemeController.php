<?php
$themeData = [];
class FormThemeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view' , 'applyTheme', 'getThemes', 'apply_theme','inspectTheme', 'applyThemeForms','elementCssProperties','applyThemeToForms','textCSSProperties', 'customProperties','applyEffect'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FormTheme;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FormTheme']))
		{
			$model->attributes=$_POST['FormTheme'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FormTheme']))
		{
			$model->attributes=$_POST['FormTheme'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FormTheme');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FormTheme('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FormTheme']))
			$model->attributes=$_GET['FormTheme'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FormTheme the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FormTheme::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FormTheme $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-theme-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
//        public function actionapplyThemesToForms()
//{
//    $theme = Themes::model()->findByPk(87); // Assuming you have a model for themes
//
//    if ($theme !== null) {
//        $forms = ApplicationForms::model()->findAll(); // Assuming you have a model for forms
//
//        foreach ($forms as $form) {
//            // Apply the theme's CSS properties to the form
//            $form->setAttribute('style', 'color:' . $theme->color . '; font-size:' . $theme->font_size . '; background-color:' . $theme->background_color . '; padding:' . $theme->padding . '; margin:' . $theme->margin . '; border:' . $theme->border . ';');
//            // Continue applying other theme attributes as required
//        }
//    }
//}
public function actionApplyTheme()
{
//    $theme = Themes::model()->findByPk(87); // Assuming you have a model for themes
//    //print_r($theme);
//   // die();
//    if ($theme !== null) {
//        $forms = ApplicationForms::model()->findAll(); // Assuming you have a model for forms
//        print_r($forms);
//    die();
//        foreach ($forms as $form) {
//            // Apply the theme's CSS properties to the form
//            $form->setAttribute('style', 'color:' . $theme->color . '; font-size:' . $theme->font_size . '; background-color:' . $theme->background_color . '; padding:' . $theme->padding . '; margin:' . $theme->margin . '; border:' . $theme->border . ';');
//            
//            // Logging the form ID and applied theme properties
//        }
//        
//        echo "Theme properties applied successfully!";
//    } else {
//        echo "Theme not found!";
//    }
//    ///////////////////////////////////////////////////////////// css_properties for Course Form ///////////////////////////////////////
//      $cssProperties = CssProperties::model()->findAll();
//$cssString = ''; // Initialize the variable
//$propertyValuePairs = []; // Keep track of unique property-value pairs
//
//foreach ($cssProperties as $cssProperty) {
//    $property = $cssProperty->property_name;
//    $value = $cssProperty->property_value;
//    $pair = $property . ': ' . $value;
//
//    // Check if the pair already exists
//    if (!in_array($pair, $propertyValuePairs)) {
//        $cssString .= $pair . '; ';
//        $propertyValuePairs[] = $pair; // Add the pair to the array
//    }
//}
//
//echo $cssString; // Output the unique property-value pairs

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //echo "Theme properties applied successfully!";
    /*$model = new FormTheme();
    $themes = FormTheme::getThemes();
    
    if (isset($_POST['FormTheme'])) {
        $selectedThemeId = $_POST['FormTheme']['themeId'];
        $selectedTheme = FormTheme::model()->findByPk($selectedThemeId);
        
        if ($selectedTheme) {
            $formThemes = [
                $selectedTheme->form_element => [
                    'background-color' => $selectedTheme->background-color,
                    'padding' => $selectedTheme->padding,
                    'border' => $selectedTheme->border,
                    // Add more properties as needed
                ],
            ];
            
            // Save the selected theme in session or any other storage mechanism as per your requirement
            Yii::app()->session['selectedTheme'] = $formThemes;
        }
    }

    $this->render('apply_theme', ['model' => $model, 'themes' => $themes]);*/

//public function actionApplyThemeForms($id=1)
//{
//$model = SelectedTheme::model()->find();
//  $themeId  = $model->theme_ID;
////echo   $themeId ;
//$elementCssProperties = ElementCssProperties::model()->findAll();
//$themesColumnName =[];
//foreach($elementCssProperties as $elementCssProperty){
//    
//   $themesColumnName [] = $elementCssProperty->theme_columns;
//}
////var_dump($themesColumnName) ;
//// Print the unique CSS property names
////print_r($themesColumnName);
////die();
//$theme = Themes::model()->findByPk($themeId);
//  if ($theme !== null) {
//    $cssStyles = [];
//    foreach ($themesColumnName as $columnName) {
//        if (isset($theme->$columnName)) {
//            $cssStyle = str_replace('_', '-', $columnName);
//            $cssValue = $theme->$columnName;
//            $cssStyles[] = "$cssStyle: $cssValue";
//        }
//    }
////    print_r($cssStyles);
////    die();
//
//    $cssStylesString = implode('; ', $cssStyles);
//    echo $cssStylesString;
//} else {
//    // Handle the case when no theme is found for the given theme_ID
//}
//}
//public function actionElementCssProperties()
//{
//    $model = new FormTheme();
//    $ids = $model->model()->findAll(array('select' =>'id'));
//    //var_dump($ids);
//    $style = [];
//    foreach($ids as $id){
//        $model = FormTheme::model()->findByPk($id->id);
//        
//     if ($model !== null) {
//            // Get the column values and format as a string
//            $values = [];
//            $values[] =  $model->form_element . '{' . $model->property . ':' . $model->value .';'. '}';
//
//            // Append the formatted string to the result array
//            $style[] =  implode(',', $values) ;
//        }
//        else {
//            echo "Data not found for ID: {$id->id}\n";
//        }
//        
//    }
//    
// $output = implode('', $style);
//    echo $output;
//
//    
//}
function saveThemeToRAM($themeId, $themeStyles) {
    global $themeData;
    $themeData[$themeId] = $themeStyles;
        return $themeStyles;  // Return the styles here

}

// Function to fetch theme data from the PHP array
function getThemeFromRAM($themeId) {
    global $themeData;
    return isset($themeData[$themeId]) ? $themeData[$themeId] : null;
}

public function actionApplyThemeToForms()
{
//    $controllerId = isset($_GET['controller']) ? $_GET['controller'] : null;
//    $actionId = isset($_GET['action']) ? $_GET['action'] : null;
//
//    $mapping = FormThemeMapping::model()->find(
//        'controller = :controller AND action = :action',
//        array(':controller' => $controllerId, ':action' => $actionId)
//    );
//
//    if ($mapping !== null) {
//        $themeId = $mapping->theme_ID;
    $currentTheme = CurrentTheme::model()->find();

    if ($currentTheme !== null) {
        $themeId = $currentTheme->theme_ID;

        $filePath = 'css/theme_dump.css';

        $themeStyles = $this->getThemeFromRAM($themeId);

                $themeToApply = null;


        // Set the timezone to 'Asia/Kolkata'
        date_default_timezone_set('Asia/Kolkata');
        $url = Yii::app()->createAbsoluteUrl('getCurrentTime/index'); // Change this based on your configuration
        
        // Make an HTTP request to fetch the current time
        $currentTimeResponse = file_get_contents($url);
        
        if ($currentTimeResponse !== false) {
            // Decode the JSON response
            $currentTimeData = json_decode($currentTimeResponse, true);

            // Get the current time from the response
            $currentTime = $currentTimeData['currentTime'];
            $currentTime = date_create()->format('H:i');
//        echo $currentTime;
      
        date_default_timezone_set('Asia/Kolkata');

            // Define night time range (8 PM to 6 AM)
              $nightStart = $currentTimeData['nightStart'];
            $nightEnd = $currentTimeData['nightEnd'];
            
            

            // Convert current time to strtotime format
            $currentTimeStrToTime = strtotime($currentTime);
            $nightStartStrToTime = strtotime($nightStart);
            $nightEndStrToTime = strtotime($nightEnd);
//            
//             print_r($nightStartStrToTime);
//            print_r($nightEndStrToTime);
//            die();

            // Check if current time falls within the night time range
            if ($currentTimeStrToTime >= $nightStartStrToTime || $currentTimeStrToTime <= $nightEndStrToTime) {
            // Apply night theme (theme with ID 94)
            $themeToApply = 94;
        } else {
            // Apply theme based on the retrieved theme_ID
            $themeToApply = $themeId;
        }

        // Apply the selected theme
        $theme = Themes::model()->findByPk($themeToApply);

              if ($themeStyles === null) {
    $elementCssProperties = ElementCssProperties::model()->findAll();
    $themesColumnName = [];
    foreach ($elementCssProperties as $elementCssProperty) {
        $themesColumnName[] = $elementCssProperty->theme_columns;
    }
    $themesColumnName = array_unique($themesColumnName);

    $cssStyles = [];
    foreach ($themesColumnName as $columnName) {
        if ($columnName === 'background_image') {
            // Handle background image separately by adding the URL
            if (isset($theme->$columnName)) {
                $cssStyles[] = "background-image: url('" . $theme->$columnName . "')";
            }
        } else {
            if (isset($theme->$columnName)) {
                $cssStyle = str_replace('_', '-', $columnName);
                $cssValue = $theme->$columnName;
                $cssStyles[] = "$cssStyle: $cssValue";
            }
        }
        
    }

    $cssStylesString = implode('; ', $cssStyles);
    $this->saveThemeToRAM($themeId, $cssStylesString);

                echo json_encode(['css' => $cssStylesString]);
} else {
    echo "Theme not found for the given theme_ID.";
}
            echo json_encode(['css' => $themeStyles]);
        }
        else {
        echo "Mapping not found for the specified controller and action!";
    }
}}

function customFormatCss($cssStyles)
{
    $result = '';

    foreach ($cssStyles as $textType => $styles) {
        $result .= $textType . ' {';

        foreach ($styles as $property => $value) {
            if ($property === 'font-size') {
                $result .= 'font-size: ' . $value . 'px; ';
            } else if ($property === 'text_decoration') {
                $result .= 'text-decoration: ' . $value . '; ';
            } else {
                $result .= $property . ': ' . $value . '; ';
            }
        }

        $result = rtrim($result, '; ');  // Remove the last semicolon and space
        $result .= '} ';
    }

    return $result;
}


public function actionTextCSSProperties()
{
    // Retrieve the current theme ID
    $currentTheme = CurrentTheme::model()->find();

    if ($currentTheme !== null) {
        $themeId = $currentTheme->theme_ID;
//        print_r($themeId);
        
        // Retrieve text type CSS properties for the specified theme_ID
        $textCssProperties = ThemeTextCssPropertiesValue::model()->findAll(
            'theme_id = :themeId',
            array(':themeId' => $themeId)
        );

        // Fetch text types from the TextType model
        $textTypes = TextType::model()->findAll(array('select' => 'id, text_type'));

        // Create an associative array of text types for easy access
        $textTypesMap = array();
        foreach ($textTypes as $textType) {
            $textTypesMap[$textType->id] = $textType->text_type;
        }

        // Group CSS properties by text type using the text type names
        $cssStyles = array();

        foreach ($textCssProperties as $cssProperty) {
            $textTypeId = $cssProperty->text_type_id;
            $textTypeName = isset($textTypesMap[$textTypeId]) ? $textTypesMap[$textTypeId] : "Unknown";

            // Replace underscores with dashes in the CSS property name
            $cssStyle = str_replace('_', '-', $cssProperty->text_CSS_Property);
            $cssValue = $cssProperty->value;

            // Add CSS property for the text type
            if (!isset($cssStyles[$textTypeName])) {
                $cssStyles[$textTypeName] = array();
            }

            $cssStyles[$textTypeName][$cssStyle] = $cssValue;
        }

        // Convert CSS styles to a custom string format
        $customCssString = $this->customFormatCss($cssStyles);

        // Convert the custom CSS string to JSON and echo it
        echo $customCssString;
    } else {
        echo "Current theme not found.";
    }
}
 public function actionCustomProperties($controllerId, $actionId)
    {
        $form = ApplicationForms::model()->findByAttributes(array(
            'controller' => $controllerId,
            'action' => $actionId
        ));

        if ($form) {
            $formId = $form->id;

            $properties = CustomPageProperties::model()->findAllByAttributes(array('application_forms_id' => $formId));
            
            $cssStyle = "<style>\n";
            foreach ($properties as $property) {
                
               
                $cssStyle .= "{$property->element} {\n";
                $cssStyle .= "    {$property->css_properties}: {$property->value};\n";
                $cssStyle .= "}\n";
            }
            $cssStyle .= "</style>";
              print_r($cssStyle);
//                die();
            return $cssStyle;
        }

        return '';
    }
public function actionApplyEffect()
{
    $controllerId = isset($_GET['controller']) ? $_GET['controller'] : null;
    $actionId = isset($_GET['action']) ? $_GET['action'] : null;

    // Find the ApplicationForms model that matches the current controller and action
    $applicationForm = ApplicationForms::model()->findByAttributes(['controller' => $controllerId, 'action' => $actionId]);

    if ($applicationForm) {
        // Retrieve the form_id for the matched ApplicationForms model
        $formId = $applicationForm->id;

        // Find the matching effect in the Effects model
        $effectModel = Effects::model()->findByAttributes(['form_id' => $formId]);

        if ($effectModel) {
            // Get the selected effect key from the "effects" property
            $selectedEffectKey = $effectModel->effects;

            // Read the content of effects.js
            $effectContent = file_get_contents('AjaxFiles/effects.js');

            // Check if the selected effect key exists in the effectsConfig
            if (strpos($effectContent, "\"$selectedEffectKey\":") !== false) {
                // Find the position of the selected effect key
                $pos = strpos($effectContent, "\"$selectedEffectKey\":");
                $substring = substr($effectContent, $pos);
                // Extract the JavaScript code for the selected effect
                $selectedEffectJS = substr($substring, strlen("\"$selectedEffectKey\":"), strpos($substring, '},') + 1);
                // Send the JavaScript code for the selected effect
                echo $selectedEffectJS;
            } else {
                // Effect not found in the effectsConfig
                echo CJSON::encode(['error' => 'Effect not found']);
            }
        } else {
            // Effect not found for the specified controller and action
            echo CJSON::encode(['error' => 'Effect not found']);
        }
    } else {
        // ApplicationForms entry not found for the specified controller and action
        echo CJSON::encode(['error' => 'ApplicationForms entry not found']);
    }
}






//public function actionTextCSSProperties()
//{
//    $controllerId = isset($_GET['controller']) ? $_GET['controller'] : null;
//    $actionId = isset($_GET['action']) ? $_GET['action'] : null;
//
//    $mapping = FormThemeMapping::model()->find(
//        'controller = :controller AND action = :action',
//        array(':controller' => $controllerId, ':action' => $actionId)
//    );
//
//    if ($mapping !== null) {
//        $themeId = $mapping->theme_ID;
//
//        // Retrieve text type CSS properties for the specified theme_ID
//        $textCssProperties = ThemeTextCssPropertiesValue::model()->findAll(
//            'theme_id = :themeId',
//            array(':themeId' => $themeId)
//        );
//
//        // Generate CSS styles based on retrieved text CSS properties
//        $cssStyles = [];
//        foreach ($textCssProperties as $cssProperty) {
//            // Replace underscores with dashes in the CSS property name
//            $cssStyle = str_replace('_', '-', $cssProperty->text_CSS_Property);
//            $cssValue = $cssProperty->value;
//            $cssStyles[] = "$cssStyle: $cssValue";
//        }
//
//        $cssStylesString = implode('; ', $cssStyles);
//        echo $cssStylesString;
//    } else {
//        echo "Mapping not found for the specified controller and action!";
//    }
//}


//public function applyThemeToForms($controllerId, $actionId)
//{
//    // Retrieve theme mapping based on controller and action values
//    $mapping = FormThemeMapping::model()->find(
//        'controller = :controller AND action = :action',
//        array(':controller' => $controllerId, ':action' => $actionId)
//    );
//
//    // Rest of your code to apply the theme to forms
//}

}


