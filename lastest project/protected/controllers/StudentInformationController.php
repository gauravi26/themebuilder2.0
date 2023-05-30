<?php

class StudentInformationController extends Controller
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
				'actions'=>array('create','update','getStudentDetails' ,'fetchstudentDetails'),
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
		$model=new StudentInformation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['StudentInformation']))
		{
			$model->attributes=$_POST['StudentInformation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_id));
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

		if(isset($_POST['StudentInformation']))
		{
			$model->attributes=$_POST['StudentInformation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_id));
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
		$dataProvider=new CActiveDataProvider('StudentInformation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentInformation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentInformation']))
			$model->attributes=$_GET['StudentInformation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
         public function actionGetStudentDetails()
        {
              
          $model = new StudentInformation;
        


          $this->render('GetStudentDetails', [
                'model' => $model,
    ]);
        }
        
        public function actionFetchstudentDetails($id) {
            
             $id = Yii::app()->request->getParam('id');
             $student = StudentInformation::model()->findByPk($id);
             


           if ($student === null) {
        echo CJSON::encode(array(
            'status' => false,
            'message' => 'Student not found'
        ));
    } else {
        $theme = Themes::model()->findByPk($student->theme_ID); // fetch theme based on theme_ID

        echo CJSON::encode(array(
            'status' => true,
            'first_name' => $student->first_name,
            'last_name' => $student->last_name,
            'date_of_birth' => $student->date_of_birth,
            'address' => $student->address,
            'phone_number' => $student->phone_number,
            'email_address' => $student->email_address,
            'department_name' => $student->department->department_name,
            'course_type' => $student->courseType->course_type,
            'course_name' => $student->course->course_name,
            'major' => $student->major,
            'academic_status' => $student->academic_status,
            'theme_name' => $theme->theme_name,
             'css_properties' => array(
                'color' => $theme->color,
                'font_size' => $theme->font_size,
                'background_color' => $theme->background_color,
                'padding' => $theme->padding,
               // 'margin' => $theme->margin,
                'border' => $theme->border,
                'text_align' => $theme->text_align,
                'text_shadow' => $theme->text_shadow,
                'text_indent' => $theme->text_indent,
                'letter_spacing' => $theme->letter_spacing,
                'word_spacing' => $theme->word_spacing,
                'line_height' => $theme->line_height,
                'text_transform' => $theme->text_transform,
                'text_decoration' => $theme->text_decoration,
                'font_family' => $theme->font_family,
                'font_weight' => $theme->font_weight,
                'text_overflow' => $theme->text_overflow,
                'white_space' => $theme->white_space,
                'text_orientation' => $theme->text_orientation,
                'text_wrap' => $theme->text_wrap,
                'text_justify' => $theme->text_justify,
                'text_emphasis' => $theme->text_emphasis,
                'text_spacing' => $theme->text_spacing,
                'text_shadow_color' => $theme->text_shadow_color,
                //'text_shadow_x' => $theme->text_shadow_x,
                //'text_shadow_y' => $theme->text_shadow_y,
            ),
            'emergency_contact_name' => $student->emergency_contact_name,
            'emergency_contact_phone' => $student->emergency_contact_phone,
            'emergency_contact_relationship' => $student->emergency_contact_relationship,
        ));
    }
            
        }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return StudentInformation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=StudentInformation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param StudentInformation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-information-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
