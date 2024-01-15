<?php

class ReportThemeController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','reportTheme','applyReportTheme'),
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
            $model = new ReportTheme;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['ReportTheme'])) {
                $model->attributes = $_POST['ReportTheme'];
                $pageId = $model->application_forms_id;

                if ($model->save()) {
                    // Call actionReportTheme only when the save operation is successful
                     $this->actionReportTheme($pageId, $model->theme_ID, $model->report_column, $model->report_name, $model);
                     $this->redirect(array('view', 'id' => $model->id));
                }else {
            // Handle the case where the save operation fails
            Yii::app()->user->setFlash('error', 'Failed to save the report theme.');
            var_dump("Not Save in Json");
        }
            }

            $this->render('create', array(
                'model' => $model,
            ));
        }

        
        ///////////////////Dynamic Report Theming 
        
        public function actionReportTheme($pageId, $themeId, $reportColumnName, $reportName, $model)
{
    
        $theme = Themes::model()->findByAttributes(array('ID' => $themeId));

        if ($theme !== null) {
            $cssStyles = [];

            // Get the column names dynamically
            $themesColumnName = $theme->getMetaData()->columns;

            // Define an array of column names for special handling
            $specialHandlingColumns = ['background_image', 'hover'];

         foreach ($themesColumnName as $columnName => $column) {
    $columnValue = $theme->$columnName;

    // Exclude "ID" and "theme_name" properties
    if ($columnName !== 'ID' && $columnName !== 'theme_name'&& $columnName !== 'hover' && $columnName !== 'background_image' && !empty($columnValue)) {
        $cssStyle = str_replace('_', '-', $columnName);
        $cssStyles[] = "$cssStyle: $columnValue";
    }
}

            // Construct the CSS selector dynamically
      $cssSelector = ".{$reportName} table td:nth-child({$reportColumnName})";

            // Check if there are styles for this column
            if (!empty($cssStyles)) {
              
                // Construct the main CSS rule
                        $cssRule = implode(';', $cssStyles) . ';';
        // Construct the hover effect dynamically
        $hoverCssSelector = "$cssSelector:hover";
        $hoverCssRule = null;

        // Check if there is a hover effect specified
        if (isset($theme->hover) && !empty($theme->hover)) {
            // Check if $theme->hover is an array
            if (is_array($theme->hover)) {
                // Construct the hover effect dynamically
                $hoverCssRule = implode(';', $theme->hover) . ';';
            } else {
                // If $theme->hover is not an array, use it as is
                $hoverCssRule = $theme->hover;
            }
        }

            // Store the styles in the array
            $stylesArray[$cssSelector] = $cssRule;

            if ($hoverCssSelector !== null) {
                $stylesArray[$hoverCssSelector] = $hoverCssRule;
            }

                    // Convert the array to JSON format with $formId as the key
                    $jsonStyles = json_encode([$pageId => $stylesArray], JSON_PRETTY_PRINT);

                    // Save the JSON to the file
                    $jsonFilePath = 'AjaxFiles/reportTheme.json';

                   // Read existing JSON from the file
            $existingJson = file_get_contents($jsonFilePath);

            // Decode existing JSON into an associative array
            $existingData = json_decode($existingJson, true);

            // Check if the $pageId already exists in the array
            if (isset($existingData[$pageId])) {
                // Append the new data to the existing array for the same $pageId
                $existingData[$pageId][] = $stylesArray;
            } else {
                // Create a new entry for the $pageId with an array containing the new data
                $existingData[$pageId] = [$stylesArray];
            }

            // Convert the updated array to JSON format
            $jsonStyles = json_encode($existingData, JSON_PRETTY_PRINT);

            // Save the updated JSON to the file
            file_put_contents($jsonFilePath, $jsonStyles);
            $this->redirect(array('view', 'id' => $model->id));

//            // Output the generated styles (optional)
//            echo $jsonStyles;
//                    // Output the generated styles (optional)
//                    echo $jsonStyles;
                        } else {
                            // Handle the case where there are no styles for the specified column
                            throw new CHttpException(404, 'No styles found for the specified column');
                        }
                    } else {
                        // Handle the case where the theme is not found
                        throw new CHttpException(404, 'Theme not found');
                    }

            }

public function actionApplyReportTheme()
{
    $controllerId = isset($_GET['controller']) ? $_GET['controller'] : null;
    $actionId = isset($_GET['action']) ? $_GET['action'] : null;

//     $controllerId = "courses";
//    $actionId = "create";
    // Find the ApplicationForms model that matches the current controller and action
    $applicationForm = ApplicationForms::model()->findByAttributes(['controller' => $controllerId, 'action' => $actionId]);

    if (!$applicationForm) {
        // Handle the case where ApplicationForms model is not found
        echo "ApplicationForms not found for controller: $controllerId, action: $actionId";
        return;
    }

    $pageId = $applicationForm->id;

    if ($pageId) {
        // Read the JSON file based on the pageId
        $jsonFilePath = 'AjaxFiles/reportTheme.json';
        $jsonContent = @file_get_contents($jsonFilePath);

        if ($jsonContent === false) {
            // Handle the case where the JSON file cannot be read
            echo "Error reading JSON file: $jsonFilePath";
            return;
        }

        // Decode the JSON content
        $jsonDecoded = json_decode($jsonContent, true);

        // Check if the $pageId exists in the JSON data
        if (isset($jsonDecoded[$pageId])) {
            $pageStyles = $jsonDecoded[$pageId];

//            // Use $pageStyles as needed
//            print_r($pageStyles);
                echo json_encode($pageStyles);
                
        } else {
            // Handle the case where $pageId doesn't exist in the JSON data
            echo "Styles not found for page $pageId";
        }
    }
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

		if(isset($_POST['ReportTheme']))
		{
			$model->attributes=$_POST['ReportTheme'];
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
		$dataProvider=new CActiveDataProvider('ReportTheme');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ReportTheme('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReportTheme']))
			$model->attributes=$_GET['ReportTheme'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ReportTheme the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ReportTheme::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ReportTheme $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='report-theme-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
