<?php

class FacultyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
    //public $title = "Faculties";
     //   public $params;

	
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
				'actions'=>array('index','view', 'newview'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'getFacultyDetails', 'fetchFaculty', 'getCourseTypes', 'getFacultyDetailsDynamically', 'getFacultyDetailsColumnDynamically', 'fectchFacultyDetailsColumn'),
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
        public function actionView($id)
	{
		$this->render('newview',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	/*public function actionView($id)
{
          
            $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
         //   $model = $this->loadModel($id);

    // Get the course types associated with this faculty member
  // $courseTypes = $this->getCourseTypes($id);

   // $this->render('view', array(
      //  'model' => $model,
       // 'courseTypes' => $courseTypes,
   // ));
  
}*/

  


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Faculty;
                $courseTypes = CourseType::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                    if (isset($_POST['Faculty'])) {
                      $model->attributes = $_POST['Faculty'];
                      // Added Code Snippet 
                      // Get the selected course_type values from the form
$selectedCourseTypes = isset($_POST['Faculty']['course_type']) ? $_POST['Faculty']['course_type'] : array();
                      // print_r($selectedCourseTypes);
                      //  die();
// Save the new course types for this faculty
                         if($model->save()){
                        foreach ($selectedCourseTypes as $courseTypeID) {
                            $courseTypeModel = new FacultyCourseType;
                            $courseTypeModel->faculty_id = $model->id;
                            $courseTypeModel->course_type_id = $courseTypeID;
                            
                            $courseTypeModel->save() ;
                            // Delete any existing course types for this faculty
                       // FacultyCourseType::model()->deleteAllByAttributes(array('faculty_id' => $model->id));
                           
				
                        }
                        $this->redirect(array('view','id'=>$model->id));
                  
                       }
                    }
                     $this->render('create',array(
			'model'=>$model,
                       //Added Later 
                       //'courseTypes' => $courseTypes,

                    ));
			}

	/**sa
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Faculty']))
		{
			$model->attributes=$_POST['Faculty'];
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

	
	 //Lists models.
	 public function actionIndex()
           {
		$dataProvider=new CActiveDataProvider('Faculty');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                         'menu' => $this->renderPartial('_menu', null, true),

		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Faculty('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Faculty']))
			$model->attributes=$_GET['Faculty'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        /* public function getDepartmentsName()
            {
                $Department = Departments::model()->findByPk($this->department_id);
                if($Department)
                    return $departN->department_name;
                else
                    return '';
            }
          /* public function getDepartment_name($id)
            {
                return $this->hasOne(Departments::className(), ['id' => 'department_id'])->select('department_name');
            }

            public function getCourse_name()
            {
                return $this->hasOne(Course::className(), ['id' => 'course_id'])->select('course_name');
            }

            public function getCourse_Type()
            {
                return $this->hasOne(CourseType::className(), ['id' => 'course_type_id'])->select('course_type');
            }


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Faculty the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Faculty::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        public function actionGetCourseTypes($id)
        {
                    $courseTypes = array();
             $models = FacultyCourseType::model()->findAllByAttributes(array('faculty_id' => $id));
             foreach ($models as $model) {
                 $courseTypeModel = CourseType::model()->findByPk($model->course_type_id);
                 if ($courseTypeModel !== null) {
                     $courseTypes[] = $courseTypeModel->course_type;
                 }
             }
                   echo json_encode($courseTypes); 
                     // return $courseTypes;

                 }

       
         public function actionGetFacultyDetails()
        {
              
          $model = new Faculty;

          $this->render('GetFacultyDetails', [
                'model' => $model,
                //'facultyNames' => $facultyNames,
    ]);
        }
         public function actionGetFacultyDetailsDynamically()
        {
              
          $model = new Faculty;

          $this->render('GetFacultyDetailsDynamically', [
                'model' => $model,
                //'facultyNames' => $facultyNames,
    ]);
        }
        public function actionGetFacultyDetailsColumnDynamically()
        {
              
          $model = new Faculty;

          $this->render('GetFacultyDetailsColumnDynamically', [
                'model' => $model,
                //'facultyNames' => $facultyNames,
    ]);
        }
        public function actionFetchFaculty($faculty_id)
        
        {
            //echo "Gauravi ";
            Yii::app()->request->getParam('faculty_id');
            $faculty = Faculty::model()->findByPk($faculty_id);
           $mapping = FacultyThemeMapping::model()->findByAttributes(array('faculty_id' => $faculty_id));
            if ($mapping === null) {
                $theme_id = 1; // default theme_id if no mapping found
            } else {
                $theme_id = $mapping->theme_id;
            }

            // fetch the properties for the theme_id from the themes table
            $theme = Themes::model()->findByPk($theme_id);
            $themeProperties = array(
                'background-color' => $theme->background_color,
                'font-size' => $theme->font_size,
                'color' => $theme->color,
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
                // add more properties here
            );



             $courseTypes = array();
                $models = FacultyCourseType::model()->findAllByAttributes(array('faculty_id' =>$faculty_id ));
                
                foreach ($models as $model) {
                    $courseTypeModel = CourseType::model()->findByPk($model->course_type_id);
                    if ($courseTypeModel !== null) {
                        $courseTypes[] = $courseTypeModel->course_type;
                    }
                }
            $strcourseTypes = implode(",", $courseTypes);
            if ($faculty === null) {
                echo CJSON::encode(array(
                    'status' => false,
                    'message' => 'Faculty not found'
                ));
            } else {
                $department = Departments::model()->findByPk($faculty->department_id);
        $course = Courses::model()->findByPk($faculty->course_id);

                echo CJSON::encode(array(
                    'status' => true,
                    'faculty_name' => $faculty->faculty_name,
                    'faculty_code' => $faculty->faculty_code,
                    'department_name' => $department->department_name,
                    'course_name' => $course->course_name,
                    'email' => $faculty->email,
                    'phone' => $faculty->phone,
                    'address' => $faculty->address,
                    'courseTypes'=> $strcourseTypes,
                    'themeProperties' => $themeProperties
                ));
            }
            Yii::app()->end();
        }
        public function actionFectchFacultyDetailsColumn($faculty_id)
        {
            // Fetch faculty details
            $faculty = Faculty::findAll($faculty_id);

            // Fetch column themes from the mapping table
            $columnThemes = FacultyColumnThemeMapping::find()->all();

            // Map column names to themes
            $columnThemeMap = [];
            foreach ($columnThemes as $columnTheme) {
                $columnThemeMap[$columnTheme->column_name] = $columnTheme->theme_id;
            }

            // Pass faculty details and column themes to the view
            return $this->render('faculty_details', [
                'faculty' => $faculty,
                'columnThemeMap' => $columnThemeMap,
            ]);
        }
         public function actionApplyThemes($menuForm)
    {
            echo "Gauravi ";
            die();
             // Retrieve the form ID based on the form name
        $form = ApplicationForm::model()->findByAttributes(array('menu_form' => $menuForm));
        if ($form === null) {
            // Handle error: form not found
        }

        // Retrieve the form elements for the specified form
        $formElements = FormElements::model()->findAllByAttributes(array('form_id' => $form->id));
        if (empty($formElements)) {
            // Handle error: no form elements found
        }

        // Loop through each form element and retrieve the associated themes
        foreach ($formElements as $element) {
            $themes = Yii::app()->db->createCommand()
                ->select('t.theme_name, t.css_properties')
                ->from('form_element_theme_mapping m')
                ->join('themes t', 't.id = m.theme_id')
                ->where('m.form_element_id = :elementId', array(':elementId' => $element->id))
                ->queryAll();

            // Apply the CSS properties of each theme to the form element
            foreach ($themes as $theme) {
                $cssProperties = json_decode($theme['css_properties'], true);

                // Apply CSS properties to the form element based on $cssProperties
                // ...

                // For example, you can add inline styles to the element
                echo "<style>#{$element->element_name} {";
                foreach ($cssProperties as $property => $value) {
                    echo "{$property}: {$value};";
                }
                echo "}</style>";
            }
        }
    }


	/**
	 * Performs the AJAX validation.
	 * @param Faculty $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='faculty-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        
        public function actionAjaxTest()
            {
                echo "Hello, World!";
                Yii::app()->end();
            }


}
