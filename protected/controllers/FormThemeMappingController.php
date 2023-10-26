<?php

class FormThemeMappingController extends Controller
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
				'actions'=>array('create','update','applyElementCssProperties'),
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
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
//	public function actionCreate()
//{
//    $model = new FormThemeMapping;
//
//    if (isset($_POST['FormThemeMapping'])) {
//        $model->attributes = $_POST['FormThemeMapping'];
//        $formId = $_POST['FormThemeMapping']['form_id'];
//        
//        if ($model->save()) {
//            $themeID = $model->theme_ID;
//            
//            // Fetch all FormElementCssProperties IDs
//            $formElementCssProperties = FormElementCssProperties::model()->findAll();
//            $formElementCssPropertiesIDs = array();
//            
//            foreach ($formElementCssProperties as $formElementCssProperty) {
//                $formElementCssPropertiesIDs[] = $formElementCssProperty->id;
//                var_dump($formElementCssProperty);
//            }
//            
//            // Create FormElementCssPropertiesThemeMapping records
//            foreach ($formElementCssPropertiesIDs as $formElementCssPropertyID) {
//                $mappingModel = new FormElementCssPropertiesThemeMapping;
//                $mappingModel->theme_ID = $themeID;
//                $mappingModel->form_element_css_properties_id = $formElementCssPropertyID;
//                $mappingModel->save();
//            }
//            
//            // Redirect to the "view" page after saving
//            $this->redirect(array('view', 'id' => $model->id));
//            return;
//        } else {
//            // Handle the case when the model fails to save
//            var_dump($model->errors);
//        }
//    }
//
//    $this->render('create', array(
//        'model' => $model,
//    ));
//}
  public function actionCreate()
{
    $model = new FormThemeMapping;

    if (isset($_POST['FormThemeMapping'])) {
        $model->attributes = $_POST['FormThemeMapping'];
        $themeID = $_POST['FormThemeMapping']['theme_ID'];

        // Check if the theme_ID already exists in FormElementCssPropertiesThemeMapping
        $existingMapping = FormElementCssPropertiesThemeMapping::model()->findByAttributes(array('theme_ID' => $themeID));

        if ($existingMapping) {
            // If the theme_ID exists, save the model without redirecting
            $model->save();
        } else {
            if ($model->save()) {
                // Save the set in FormElementCssPropertiesThemeMapping only if the theme_ID is not found
                $formElementCssProperties = FormElementCssProperties::model()->findAll();
                foreach ($formElementCssProperties as $formElementCssProperty) {
                    $mappingModel = new FormElementCssPropertiesThemeMapping;
                    $mappingModel->theme_ID = $themeID;
                    $mappingModel->form_element_css_properties_id = $formElementCssProperty->id;
                    $mappingModel->save();
                }
            }
        }
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('create', array(
        'model' => $model,
    ));
}


//public function actionUpdate($id)
//{
//    $model = $this->loadModel($id);
//
//    if (isset($_POST['FormThemeMapping'])) {
//        $model->attributes = $_POST['FormThemeMapping'];
//        $themeID = $_POST['FormThemeMapping']['theme_ID'];
//
//        // Retrieve the previous theme_ID
//        $previousThemeID = $model->theme_ID;
//
//        if ($model->save()) {
//            // Update records in FormElementCssPropertiesThemeMapping with the previous theme_ID
//            $mappingModels = FormElementCssPropertiesThemeMapping::model()
//                ->findAllByAttributes(array('theme_ID' => $previousThemeID));
//
//            foreach ($mappingModels as $mappingModel) {
//                $mappingModel->theme_ID = $themeID;
//                $mappingModel->save();
//            }
//
//            $this->redirect(array('view', 'id' => $model->id));
//        }
//    }
//
//    $this->render('update', array(
//        'model' => $model,
//    ));
//}
//////////////////////Update and Create new set of theme_ID with properties 
public function actionUpdate($id)
{
    $model = $this->loadModel($id);

    if (isset($_POST['FormThemeMapping'])) {
        $model->attributes = $_POST['FormThemeMapping'];
        $themeID = $_POST['FormThemeMapping']['theme_ID'];

        // Create a new set of FormElementCssPropertiesThemeMapping with the updated theme_ID
        $formElementCssProperties = FormElementCssProperties::model()->findAll();
        $formElementCssPropertiesIDs = array();
        foreach ($formElementCssProperties as $formElementCssProperty) {
            $formElementCssPropertiesIDs[] = $formElementCssProperty->id;
        }

        if ($model->save()) {
            // Delete the previous set of FormElementCssPropertiesThemeMapping
            FormElementCssPropertiesThemeMapping::model()
                ->deleteAllByAttributes(array('theme_ID' => $model->theme_ID));

            // Create a new set of FormElementCssPropertiesThemeMapping with the updated theme_ID
            foreach ($formElementCssPropertiesIDs as $formElementCssPropertyID) {
                $mappingModel = new FormElementCssPropertiesThemeMapping;
                $mappingModel->theme_ID = $themeID;
                $mappingModel->form_element_css_properties_id = $formElementCssPropertyID;
                $mappingModel->save();
            }

            $this->redirect(array('view', 'id' => $model->id));
        }
    }

    $this->render('update', array(
        'model' => $model,
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
		$dataProvider=new CActiveDataProvider('FormThemeMapping');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FormThemeMapping('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FormThemeMapping']))
			$model->attributes=$_GET['FormThemeMapping'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FormThemeMapping the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FormThemeMapping::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FormThemeMapping $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-theme-mapping-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
       public function actionapplyelementcssproperties()
{
         //  echo ("Hii");
      $controllerId = isset($_GET['controller']) ? $_GET['controller'] : null;
    $actionId = isset($_GET['action']) ? $_GET['action'] : null;

    $mapping = FormThemeMapping::model()->find(
        'controller = :controller AND action = :action',
        array(':controller' => $controllerId, ':action' => $actionId)
    );

    if ($mapping !== null) {
        $themeId = $mapping->theme_ID;

        $records = FormElementCssPropertiesThemeMapping::model()->findAll(
            'theme_ID = :theme_ID',
            array(':theme_ID' => $themeId)
        );
//        var_dump($records);

        $cssString = [];

        // Loop through each record and fetch form_element and css_property values
        foreach ($records as $record) {
            $formElementCssPropertiesId = $record->form_element_css_properties_id;
            //$value = $record->value;
           // var_dump($value);
            // Fetch the form_element and css_property values using the formElementCssPropertiesId
            $formElementCssProperties = FormElementCssProperties::model()->findByPk($formElementCssPropertiesId);
            if ($formElementCssProperties !== null) {
                $formElement = $formElementCssProperties->form_element;
                $cssProperty = $formElementCssProperties->css_property;
                $value = $record->value; // Assign the value from the record


                // Append the form_element and css_property values to the string
//                $cssString = [];
                 $cssString [] = $formElement . ' { ' . $cssProperty .':' .$value. ' } ';
                 // var_dump($cssString) ; 

                     
            }
        }
//        print_r($cssString);
        $output = implode('', $cssString);
echo $output;
     
        // $cssString now contains the concatenated form_element and css_property values
        // Do something with $cssString
      
    }
}


        
}
