<?php
Yii::import('application.models.Departments');
Yii::import('application.models.CourseType');
class CoursesController extends Controller
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
				'actions'=>array('index','view','applyThemeToForms'),
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
                        $courses = Courses::model()->findByPk($id);

                    $criteria = new CDbCriteria();
                $criteria->with = array('course_type');
               // $criteria->select = 't.*, CourseType.course_type AS course_type';
                $criteria->compare('t.id', $courses->id);
                    //$this->render('_view',array('id'=>$model->id));
                    $courses = Courses::model()->find($criteria);

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
    $model=new Courses;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Courses']))
    {
        $model->attributes=$_POST['Courses'];
       $courseType = CourseType::model()->findByPk($model->course_type_id);

        if($courseType !== null) {
            $model->course_type_id = $courseType->id;
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }
    }

    $this->render('create',array(
        'model'=>$model,
    ));
}

public function actionUpdate($id)
{
    $model=$this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Courses']))
    {
        $model->attributes=$_POST['Courses'];
        $courseType = CourseType::model()->findByPk($model->course_type_id);

        if($courseType !== null) {
            $model->course_type_id = $courseType->id;
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }
    }

    $this->render('update',array(
        'model'=>$model,
    ));
}

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
		$dataProvider=new CActiveDataProvider('Courses');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Courses('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Courses']))
			$model->attributes=$_GET['Courses'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Courses the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Courses::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Courses $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='courses-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
 public function applyThemeToForms()
{
   $cssProperties = CssProperties::model()->findAll();
$cssString = ''; // Initialize the variable
$propertyValuePairs = []; // Keep track of unique property-value pairs

foreach ($cssProperties as $cssProperty) {
    $property = $cssProperty->property_name;
    $value = $cssProperty->property_value;
    $pair = $property . ': ' . $value;

    // Check if the pair already exists
    if (!in_array($pair, $propertyValuePairs)) {
        $cssString .= $pair . '; ';
        $propertyValuePairs[] = $pair; // Add the pair to the array
    }
}

echo $cssString; // Output the unique property-value pairs

}


public function getCSSProperties() {
    
    $cssproperties = CssProperties::getCssProperties();
    
    $cssString = '';
    foreach($cssproperties as $property => $value){
        
        $cssString .= $property.':'.value.';';
    }
    
   
    
}

}
