<?php

/**
 * This is the model class for table "faculty".
 *
 * The followings are the available columns in table 'faculty':
 * @property integer $id
 * @property string $faculty_name
 * @property string $faculty_code
 * @property integer $department_id
 * @property integer $course_type_id
 * @property integer $course_id
 * @property string $email
 * @property string $phone
 * @property string $address
 *
 * The followings are the available model relations:
 * @property Departments $department
 * @property CourseType $courseType
 * @property Courses $course
 */
class Faculty extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'faculty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('faculty_name, faculty_code, department_id, course_id, email, phone, address', 'required'),
                    array('department_id,  course_id', 'numerical', 'integerOnly'=>true),
                    array('faculty_name, faculty_code, email, address', 'length', 'max'=>255),
                    array('phone', 'match', 'pattern' => '/^[0-9]{10,20}$/', 'message' => 'Please enter a valid phone number'),
                    array('email', 'email', 'message' => 'Please enter a valid email address'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, faculty_name, faculty_code, department_id,  course_id, email, phone, address', 'safe', 'on'=>'search'),
			
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'department' => array(self::BELONGS_TO, 'Departments', 'department_id'),
                        'course' => array(self::BELONGS_TO, 'Courses', 'course_id'),
                        'facultyCourseTypes' => array(self::HAS_MANY, 'FacultyCourseType', 'faculty_id'),
			

			//'course' => array(self::BELONGS_TO, 'Courses', 'course_id'),
                   // 'department' => array(self::BELONGS_TO, 'Departments', 'department_name'),
			//'courseType' => array(self::BELONGS_TO, 'CourseType', 'course_type_id'),
			
		);
	}

public function getFacultyCourseTypes()
{
    return $this->hasMany(FacultyCourseType::className(), ['faculty_id' => 'id']);
}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'faculty_name' => 'Faculty Name',
			'faculty_code' => 'Faculty Code',
			'department_id' => 'Department',
			
			'course_id' => 'Course',
			'email' => 'Email',
			'phone' => 'Phone',
			'address' => 'Address',
                        
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('faculty_name',$this->faculty_name,true);
		$criteria->compare('faculty_code',$this->faculty_code,true);
		$criteria->compare('department_id',$this->department_id);
		
		//$criteria->compare('course_id',$this->course_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
               		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Faculty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        

    public function find($criteria) {
        
    }

}
