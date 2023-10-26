<?php

   Yii::import('application.models.Departments');


class DepartmentsController extends Controller
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
				'actions'=>array('create','update','checkDeptCode'),
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
              //Yii::app();
		$model=new Departments;
                   $departments = Departments::model()->findAll();
    $departmentList = CHtml::listData($departments, 'department_code', 'department_name');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Departments']))
		{
			$model->attributes=$_POST['Departments'];
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

		if(isset($_POST['Departments']))
		{
			$model->attributes=$_POST['Departments'];
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
		$dataProvider=new CActiveDataProvider('Departments');
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
		$model=new Departments('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Departments']))
			$model->attributes=$_GET['Departments'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Departments the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Departments::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Departments $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='departments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
            
           /* public function actionCheckDeptCode()
                    {    
                if(Yii::app()->request->isAjaxRequest && isset($_POST['Departments']))
                        $dept_code = $_POST['departmentCode'];
                        $dept = Departments::model()->findByAttributes(array('department_code' => $dept_code));
                        
                        if ($dept) {
                            echo CJSON::encode(array(
                                'status' => 'success',
                                'name' => $dept->department_name,
                                'description' => $dept->department_desc
                            ));
                        } else {
                            echo CJSON::encode(array(
                                'status' => 'error',
                                'name' => '',
                                'description' => ''
                            ));
                        }

                        Yii::app()->end();
                    }

          /* if(Yii::app()->request->isAjaxRequest && isset($_POST['Departments'])) {
                $dept_code = $_POST['dept_code'];
                $dept = Departments::model()->findByAttributes(array('department_code' => $dept_code));
               
                if($dept) {
                    echo CJSON::encode(array(
                        'name' => $dept->department_name,
                        'description' => $dept->department_desc
                    ));
                } else {
                    echo CJSON::encode(array(
                        'name' => '',
                        'description' => ''
                    ));
                     print_r($dept);
                     die();
                }
                Yii::app()->end();
            }
        }*/
       
          public function actionCheckDeptCode($department_code) {
              

              
              // echo "Gauravi ";
                $departmentCode = Yii::app()->request->getParam('department_code');

                $dept = Departments::model()->findByAttributes(array('department_code' => $departmentCode));

                if ($dept === null) {
                   // Department with given code not found
                   echo CJSON::encode(array(
                      'status' => false,
                      'message' => 'Department with given code not found.'
                   ));
                } else {
                   // Department found, return its name and description
                   echo CJSON::encode(array(
                      'status' => true,
                      'name' => $dept->department_name,
                      'description' => $dept->department_desc
                   ));
                }
                Yii::app()->end();
            }
                
            
     public function applyThemeToForms()
{
    $controllerId = $this->getId();
    $actionId = $this->getAction()->getId();

    $mapping = FormThemeMapping::model()->find(
        'controller = :controller AND action = :action',
        array(':controller' => $controllerId, ':action' => $actionId)
    );

    if ($mapping !== null) {
        $themeId = $mapping->theme_ID;
        $theme = Themes::model()->findByPk($themeId); // Assuming you have a model for themes

        if ($theme !== null) {
            // Apply the theme's CSS properties to the controller and action
            Yii::app()->clientScript->registerCss('theme', '
                body {
                    color:' . $theme->color . ';
                    font-size:' . $theme->font_size . ';
                    background-color:' . $theme->background_color . ';
                    padding:' . $theme->padding . ';
                    margin:' . $theme->margin . ';
                    border:' . $theme->border . ';
                }
            ');

            echo "Theme properties applied successfully!";
        }
    } else {
        echo "Theme not found!";
    }
}

}



