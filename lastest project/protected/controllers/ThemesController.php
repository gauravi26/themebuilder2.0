<?php

class ThemesController extends Controller
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
				'actions'=>array('index','view', 'input', 'cssinput', 'cssinputview', 'cssinputcustomupdate', 'manage', 'customupdateview'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','customDelete'),
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
		$model=new Themes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Themes']))
		{
			$model->attributes=$_POST['Themes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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

		if(isset($_POST['Themes']))
		{
			$model->attributes=$_POST['Themes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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
		$dataProvider=new CActiveDataProvider('Themes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Themes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Themes']))
			$model->attributes=$_GET['Themes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Themes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Themes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        public function loadModelCustom($Themes ,$id)
	{
		$model=Themes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
       public function actionInput()
{
    $model = new Themes;

    if(isset($_POST['Themes']))
    {
        $model->attributes = $_POST['Themes'];
        if($model->validate())
        {
            // Save the model
            $model->save(false);

            // Set current_tab to the next tab's ID
            if($model->current_tab == 'box-model')
            {
                $model->current_tab = 'background';
                $model->save(false);
            }
            elseif($model->current_tab == 'background')
            {
                // Redirect to finish if all tabs have been filled
                if($model->box_model && $model->background_image && $model->background_color && $model->background_repeat && $model->background_position)
                {
                    $model->current_tab = 'finish';
                    $model->save(false);

                    Yii::app()->user->setFlash('success', 'All tabs have been filled.');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }

            // Redirect to the current tab
            Yii::app()->user->setFlash('success', 'Tab saved successfully.');
            $this->redirect(array('save-theme'));
        }
    }

   
    $this->render('input', array(
        'model' => $model,
    ));
}

     public function actionCssinput()
{
    if(isset($_POST['save_theme']))
    {
        // Handle form submission
        // Get the posted form data
        //
        $theme_name = empty($_POST['theme_name']) ? null : $_POST['theme_name'];

        $margin_top = empty($_POST['margin_top']) ? null : $_POST['margin_top'];
        $margin_right = empty($_POST['margin_right']) ? null : $_POST['margin_right'];
        $margin_bottom = empty($_POST['margin_bottom']) ? null : $_POST['margin_bottom'];
        $margin_left = empty($_POST['margin_left']) ? null : $_POST['margin_left'];
        $padding_top = empty($_POST['padding_top']) ? null : $_POST['padding_top'];
        $padding_right = empty($_POST['padding_right']) ? null : $_POST['padding_right'];
        $padding_bottom = empty($_POST['padding_bottom']) ? null : $_POST['padding_bottom'];
        $padding_left = empty($_POST['padding_left']) ? null : $_POST['padding_left'];
        $height = empty($_POST['height']) ? null : $_POST['height'];
        $width = empty($_POST['width']) ? null : $_POST['width'];
        $max_height = empty($_POST['max_height']) ? null : $_POST['max_height'];
        $max_width = empty($_POST['max_width']) ? null : $_POST['max_width'];
        $min_height = empty($_POST['min_height']) ? null : $_POST['min_height'];
        $min_width = empty($_POST['min_width']) ? null : $_POST['min_width'];
        $box_sizing = empty($_POST['box_sizing']) ? null : $_POST['box_sizing'];
        $background_color = empty($_POST['background_color']) ? null : $_POST['background_color'];
        $background_image = empty($_POST['background_image']) ? null : $_POST['background_image'];
        $color=empty($_POST['color']) ? null : $_POST['color'];
        $letter_spacing = empty($_POST['letter_spacing']) ? null : $_POST['letter_spacing'];
        $word_spacing = empty($_POST['word_spacing']) ? null : $_POST['word_spacing'];
        $line_height = empty($_POST['line_height']) ? null : $_POST['line_height'];
        $text_transform = empty($_POST['text_transform']) ? null : $_POST['text_transform'];
        $text_align = empty($_POST['text_align']) ? null : $_POST['text_align'];
        $text_indent = empty($_POST['text_indent']) ? null : $_POST['text_indent'];
        $text_decoration = empty($_POST['text_decoration']) ? null : $_POST['text_decoration'];
        $text_overflow = empty($_POST['text_overflow']) ? null : $_POST['text_overflow'];
        $white_space = empty($_POST['white_space']) ? null : $_POST['white_space'];
        $text_orientation = empty($_POST['text_orientation']) ? null : $_POST['text_orientation'];
        $text_wrap = empty($_POST['text_wrap']) ? null : $_POST['text_wrap'];
        $float_property = empty($_POST['float_property']) ? null : $_POST['float_property'];
        $border_width= empty($_POST['border_width']) ? null : $_POST['border_width'];
        $border_style = empty($_POST['border_style']) ? null : $_POST['border_style'];
        $outline_color = empty($_POST['outline_color']) ? null : $_POST['outline_color'];

        $outline_style = empty($_POST['outline_style']) ? null : $_POST['outline_style'];
        $outline_width = empty($_POST['outline_width']) ? null : $_POST['outline_width'];
        $link_color= empty($_POST['link_color']) ? null : $_POST['link_color'];
        $link_hover_color = empty($_POST['link_hover_color']) ? null : $_POST['link_hover_color'];
        $link_visited_color= empty($_POST['link_visited_color']) ? null : $_POST['link_visited_color'];
      //Grid
        $grid = empty($_POST['grid']) ? null : $_POST['grid'];
        $grid_template_columns = empty($_POST['grid_template_columns']) ? null : $_POST['grid_template_columns'];
        $grid_template_rows = empty($_POST['grid_template_rows']) ? null : $_POST['grid_template_rows'];
        $grid_template_areas = empty($_POST['grid_template_areas']) ? null : $_POST['grid_template_areas'];
        $grid_gap = empty($_POST['grid_gap']) ? null : $_POST['grid_gap'];
        $grid_auto_columns = empty($_POST['grid_auto_columns']) ? null : $_POST['grid_auto_columns'];
        $grid_auto_rows = empty($_POST['grid_auto_rows']) ? null : $_POST['grid_auto_rows'];
        $grid_auto_flow = empty($_POST['grid_auto_flow']) ? null : $_POST['grid_auto_flow'];
        $grid_column_start = empty($_POST['grid_column_start']) ? null : $_POST['grid_column_start'];
        $grid_column_start = empty($_POST['grid_column_start']) ? null : $_POST['grid_column_start'];
        $grid_area = empty($_POST['grid_area']) ? null : $_POST['grid_area'];
        $grid_template = empty($_POST['grid_template']) ? null : $_POST['grid_template'];
        $grid_row_gap = empty($_POST['grid_row_gap']) ? null : $_POST['grid_row_gap'];
        $grid_column_gap = empty($_POST['grid_column_gap']) ? null : $_POST['grid_column_gap'];
        $grid_row_end = empty($_POST['grid_row_end']) ? null : $_POST['grid_row_end'];
        $grid_column_end = empty($_POST['grid_column_end']) ? null : $_POST['grid_column_end'];
        $grid_template_rows_mobile = empty($_POST['grid_template_rows_mobile']) ? null : $_POST['grid_template_rows_mobile'];
        $grid_template_columns_mobile = empty($_POST['grid_template_columns_mobile']) ? null : $_POST['grid_template_columns_mobile'];
        $grid_template_areas_mobile = empty($_POST['grid_template_areas_mobile']) ? null : $_POST['grid_template_areas_mobile'];
        $grid_template_mobile = empty($_POST['grid_template_mobile']) ? null : $_POST['grid_template_mobile'];
        $grid_row_gap_mobile = empty($_POST['grid_row_gap_mobile']) ? null : $_POST['grid_row_gap_mobile'];
        $grid_column_gap_mobile = empty($_POST['grid_column_gap_mobile']) ? null : $_POST['grid_column_gap_mobile'];
        $grid_gap_mobile = empty($_POST['grid_gap_mobile']) ? null : $_POST['grid_gap_mobile'];
        $grid_auto_rows_mobile = empty($_POST['grid_auto_rows_mobile']) ? null : $_POST['grid_auto_rows_mobile'];
        $grid_auto_columns_mobile = empty($_POST['grid_auto_columns_mobile']) ? null : $_POST['grid_auto_columns_mobile'];
        $grid_auto_flow_mobile = empty($_POST['grid_auto_flow_mobile']) ? null : $_POST['grid_auto_flow_mobile'];
        $grid_mobile = empty($_POST['grid_mobile']) ? null : $_POST['grid_mobile'];
        $grid_row_start_mobile = empty($_POST['grid_row_start_mobile']) ? null : $_POST['grid_row_start_mobile'];
        $grid_column_start_mobile = empty($_POST['grid_column_start_mobile']) ? null : $_POST['grid_column_start_mobile'];
        $grid_row_end_mobile = empty($_POST['grid_row_end_mobile']) ? null : $_POST['grid_row_end_mobile'];
        $grid_column_end_mobile = empty($_POST['grid_column_end_mobile']) ? null : $_POST['grid_column_end_mobile'];
        $grid_area_mobile = empty($_POST['grid_area_mobile']) ? null : $_POST['grid_area_mobile'];
        //icon
        $icon_size = empty($_POST['icon_size']) ? null : $_POST['icon_size'];
        $icon_color = empty($_POST['icon_color']) ? null : $_POST['icon_color'];
        //List
       $list_style = empty($_POST['list_style'])? null: $_POST['list_style'];
       $list_style_type = empty($_POST['list_style_type'])? null: $_POST['list_style_type'];
       $list_style_position = empty($_POST['list_style_position'])? null: $_POST['list_style_position'];
       $tab_background_color = empty($_POST['tab_background_color']) ? null : $_POST['tab_background_color'];
$tab_border_color = empty($_POST['tab_border_color']) ? null : $_POST['tab_border_color'];
$tab_border_width = empty($_POST['tab_border_width']) ? null : $_POST['tab_border_width'];
$tab_padding = empty($_POST['tab_padding']) ? null : $_POST['tab_padding'];
$tab_margin = empty($_POST['tab_margin']) ? null : $_POST['tab_margin'];
$tab_font_color = empty($_POST['tab_font_color']) ? null : $_POST['tab_font_color'];
$tab_font_size = empty($_POST['tab_font_size']) ? null : $_POST['tab_font_size'];
$tab_font_weight = empty($_POST['tab_font_weight']) ? null : $_POST['tab_font_weight'];
$tab_text_transform = empty($_POST['tab_text_transform']) ? null : $_POST['tab_text_transform'];
$tab_text_decoration = empty($_POST['tab_text_decoration']) ? null : $_POST['tab_text_decoration'];
$box_shadow = empty($_POST['box_shadow']) ? null : $_POST['box_shadow'];
$opacity = empty($_POST['opacity']) ? null : $_POST['opacity'];
$transition_property = empty($_POST['transition_property']) ? null : $_POST['transition_property'];
$transition_duration = empty($_POST['transition_duration']) ? null : $_POST['transition_duration'];
$transition_timing_function = empty($_POST['transition_timing_function']) ? null : $_POST['transition_timing_function'];
$transform = empty($_POST['transform']) ? null : $_POST['transform'];
$transform_origin = empty($_POST['transform_origin']) ? null : $_POST['transform_origin'];
$animation_name = empty($_POST['animation_name']) ? null : $_POST['animation_name'];
$animation_duration = empty($_POST['animation_duration']) ? null : $_POST['animation_duration'];
$animation_timing_function = empty($_POST['animation_timing_function']) ? null : $_POST['animation_timing_function'];
$animation_delay = empty($_POST['animation_delay']) ? null : $_POST['animation_delay'];
$animation_iteration_count = empty($_POST['animation_iteration_count']) ? null : $_POST['animation_iteration_count'];
$animation_direction = empty($_POST['animation_direction']) ? null : $_POST['animation_direction'];

        
        /*$text_justify = $_POST['text_justify'];
        $text_emphasis = $_POST['text_emphasis'];
        $text_spacing = $_POST['text_spacing'];
        $text_shadow_color = $_POST['text_shadow_color'];
        $text_shadow_x = $_POST['text_shadow_x'];
        $text_shadow_y = $_POST['text_shadow_y'];
        $text_color = $_POST['text_color'];
        $text_opacity = $_POST['text_opacity'];
        $text_shadow_blur = $_POST['text_shadow_blur'];
        $text_shadow_spread = $_POST['text_shadow_spread'];*/

        // Save the form data to the database or perform other actions as needed
        //$inputWithPx = $input . 'px';
        $theme = new Themes;
        $theme->theme_name = $theme_name;
        
        $theme->margin_top = $margin_top. "px";
        $theme->margin_right = $margin_right. "px";
        $theme->margin_bottom = $margin_bottom. "px";
        $theme->margin_left = $margin_left. "px";
        $theme->padding_top = $padding_top. "px";
        $theme->padding_right = $padding_right. "px";
        $theme->padding_bottom = $padding_bottom. "px";
        $theme->padding_left = $padding_left. "px";
        $theme->height = $height. "px";
        $theme->width = $width. "px";
        $theme->max_height = $max_height. "px";
        $theme->max_width = $max_width. "px";
        $theme->min_height = $min_height. "px";
        $theme->min_width = $min_width. "px";
        $theme->box_sizing = $box_sizing;
        $theme->background_color = $background_color;
        $theme->background_image = $background_image;
        $theme->color = $color;
        $theme->letter_spacing = $letter_spacing. "px";
        $theme->word_spacing = $word_spacing. "px";
        $theme->line_height = $line_height. "px";
        $theme->text_transform = $text_transform;
        $theme->text_align = $text_align;
        //$theme->text_shadow = $text_shadow;
        $theme->text_indent = $text_indent. "px";
        $theme->text_decoration = $text_decoration;
        $theme->text_overflow = $text_overflow;
        $theme->white_space = $white_space. "px";
        $theme->text_orientation = $text_orientation;
        $theme->text_wrap = $text_wrap;
        $theme->border_width = $border_width. "px";
        $theme->border_style = $border_style;
        //$theme->float_property=$float_property;
        //$theme->outline=$outline;
        $theme->outline_color=$outline_color;
        $theme->outline_style=$outline_style;
        $theme->outline_width=$outline_width. "px";
        
         //link
        $theme->link_color=$link_color;
        $theme->link_visited_color=$link_visited_color;
         //Grid 
        $theme->grid_template_columns = empty($_POST['grid_template_columns']) ? null : $_POST['grid_template_columns'];
        $theme->grid_template_rows = empty($_POST['grid_template_rows']) ? null : $_POST['grid_template_rows'];
        $theme->grid_template_areas = empty($_POST['grid_template_areas']) ? null : $_POST['grid_template_areas'];
        $theme->grid_gap = empty($_POST['grid_gap']) ? null : $_POST['grid_gap'];
        $theme->justify_items = empty($_POST['justify_items']) ? null : $_POST['justify_items'];
        $theme->align_items = empty($_POST['align_items']) ? null : $_POST['align_items'];
        $theme->grid_auto_columns = empty($_POST['grid_auto_columns']) ? null : $_POST['grid_auto_columns'];
        $theme->grid_auto_rows = empty($_POST['grid_auto_rows']) ? null : $_POST['grid_auto_rows'];
        $theme->grid_auto_flow = empty($_POST['grid_auto_flow']) ? null : $_POST['grid_auto_flow'];
        $theme->grid_column_start = empty($_POST['grid_column_start']) ? null : $_POST['grid_column_start'];
        $theme->grid_column_start = empty($_POST['grid_column_start']) ? null : $_POST['grid_column_start'];
        $theme->grid_area = empty($_POST['grid_area']) ? null : $_POST['grid_area'];
        $theme->grid_template_areas = empty($_POST['grid_template_areas']) ? null : $_POST['grid_template_areas'];
        $theme->grid_template = empty($_POST['grid_template']) ? null : $_POST['grid_template'];
        $theme->grid_row_gap = empty($_POST['grid_row_gap']) ? null : $_POST['grid_row_gap'];
        $theme->grid_column_gap = empty($_POST['grid_column_gap']) ? null : $_POST['grid_column_gap'];
        $theme->grid_row_end = empty($_POST['grid_row_end']) ? null : $_POST['grid_row_end'];
        $theme->grid_column_end = empty($_POST['grid_column_end']) ? null : $_POST['grid_column_end'];
        $theme->grid_template_rows_mobile = empty($_POST['grid_template_rows_mobile']) ? null : $_POST['grid_template_rows_mobile'];
        $theme->grid_template_columns_mobile = empty($_POST['grid_template_columns_mobile']) ? null : $_POST['grid_template_columns_mobile'];
        $theme->grid_template_areas_mobile = empty($_POST['grid_template_areas_mobile']) ? null : $_POST['grid_template_areas_mobile'];
        $theme->grid_template_mobile = empty($_POST['grid_template_mobile']) ? null : $_POST['grid_template_mobile'];
        $theme->grid_row_gap_mobile = empty($_POST['grid_row_gap_mobile']) ? null : $_POST['grid_row_gap_mobile'];
        $theme->grid_column_gap_mobile = empty($_POST['grid_column_gap_mobile']) ? null : $_POST['grid_column_gap_mobile'];
        $theme->grid_gap_mobile = empty($_POST['grid_gap_mobile']) ? null : $_POST['grid_gap_mobile'];
        $theme->grid_auto_rows_mobile = empty($_POST['grid_auto_rows_mobile']) ? null : $_POST['grid_auto_rows_mobile'];
        $theme->grid_auto_columns_mobile = empty($_POST['grid_auto_columns_mobile']) ? null : $_POST['grid_auto_columns_mobile'];
        $theme->grid_auto_flow_mobile = empty($_POST['grid_auto_flow_mobile']) ? null : $_POST['grid_auto_flow_mobile'];
        $theme->grid_mobile = empty($_POST['grid_mobile']) ? null : $_POST['grid_mobile'];
        $theme->grid_row_start_mobile = empty($_POST['grid_row_start_mobile']) ? null : $_POST['grid_row_start_mobile'];
        $theme->grid_column_start_mobile = empty($_POST['grid_column_start_mobile']) ? null : $_POST['grid_column_start_mobile'];
        $theme->grid_row_end_mobile = empty($_POST['grid_row_end_mobile']) ? null : $_POST['grid_row_end_mobile'];
        $theme->grid_column_end_mobile = empty($_POST['grid_column_end_mobile']) ? null : $_POST['grid_column_end_mobile'];
        $theme->grid_area_mobile = empty($_POST['grid_area_mobile']) ? null : $_POST['grid_area_mobile'];
        //icon 
        $theme->icon_size = $icon_size. "px";
        $theme->icon_color=$icon_color;
       //List
        $theme -> list_style_position =$list_style_position;
        $theme -> list_style =$list_style;
        $theme -> list_style_type =$list_style_type;
         //tabs 
        $theme->tab_background_color = $tab_background_color;
        $theme->tab_border_color = $tab_border_color ;
        $theme->tab_border_width = $tab_border_width. "px";
        $theme->tab_padding = $tab_padding. "px";
        $theme->tab_margin = $tab_margin. "px";
        $theme->tab_font_color = $tab_font_color;
        $theme->tab_font_size = $tab_font_size. "px";
        $theme->tab_font_weight = $tab_font_weight. "px";
        $theme->tab_text_transform = $tab_text_transform;
        $theme->tab_text_decoration = $tab_text_decoration;
        $theme->box_shadow = $box_shadow;
        $theme->opacity = $opacity;
        $theme->transition_property = $transition_property;
        $theme->transition_duration = $transition_duration;
        $theme->transition_timing_function = $transition_timing_function;
        $theme->transform = $transform;
        $theme->transform_origin = $transform_origin;
        //animaition 
        $theme->animation_name = $animation_name;
        $theme->animation_duration = $animation_duration;
        $theme->animation_timing_function = $animation_timing_function;
        $theme->animation_delay = $animation_delay;
        $theme->animation_iteration_count = $animation_iteration_count;
        $theme->animation_direction = $animation_direction;

        


       /* $theme->text_justify = $text_justify;
        $theme->text_emphasis = $text_emphasis;
        $theme->text_spacing = $text_spacing;
        $theme->text_shadow_color = $text_shadow_color;
        $theme->text_shadow_x = $text_shadow_x;
        $theme->text_shadow_y = $text_shadow_y;
        $theme->text_color = $text_color;
        $theme->text_opacity = $text_opacity;
        $theme->text_shadow_blur = $text_shadow_blur;
        $theme->text_shadow_spread = $text_shadow_spread;*/


        if($theme->save()){
            $this->redirect(array('cssinputview','id'=>$theme->ID));

        }else{
            Yii::app()->user->setFlash('error', 'Error saving theme.');
        }

        // Render the form view
        $this->render('cssinput');
    }
    else
    {
        // Render the form view
        $this->render('cssinput');
    }
}
// In your controller action, load the theme by ID and pass it to the view
public function actioncssinputview($id)
{
    $theme = $this->loadModel($id);
    $this->render('cssinputview', array(
        'theme' => $theme,
    ));


// In your view file, display the content of the loaded theme

}
// Action for accessing the custom update page
public function actionCssinputcustomupdate($id)
{
    $model = $this->loadModelCustom('Themes', $id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Themes'])) {
        $model->attributes = $_POST['Themes'];
        if ($model->save()) {
            $this->redirect(array('customupdateview', 'id' => $model->ID));
        }
    }

    // Add debugging statements
    //var_dump($id); // Check if the correct $id value is received
    //var_dump($model); // Check the loaded model

    $this->render('cssinputupdate', array(
        'model' => $model,
    ));
}
// Controller action: customupdateview
public function actionCustomupdateview($id)
{
    $model = $this->loadModelCustom('Themes', $id);

    // Check if the theme is successfully loaded
    if ($model === null) {
        // Handle the case when the theme is not found
        throw new CHttpException(404, 'The requested theme does not exist.');
    }

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Themes'])) {
        $model->attributes = $_POST['Themes'];
        if ($model->save()) {
            $this->redirect(array('customupdateview', 'id' => $model->ID));
        }
    }

    $this->render('customupdateview', array(
        'model' => $model,
    ));
}


public function actionManage()
{
    $themes = Themes::model()->findAll();

    $this->render('manage', array(
        'themes' => $themes,
    ));
}
public function actionCustomdelete($id)
{
    $model = $this->loadModel($id); // Assuming you have a loadModel method to load the model data

    if (Yii::app()->request->isPostRequest) {
        // Perform the delete operation
        $model->delete();
        Yii::app()->user->setFlash('success', 'Item deleted successfully.');
        // Redirect to another page after deletion
        $this->redirect(array('index')); // Replace 'index' with the desired destination after deletion
    } else {
        // Render the confirmation view
        $this->render('confirmDelete', array('model' => $model));
    }
}


	/**
	 * Performs the AJAX validation.
	 * @param Themes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='themes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
