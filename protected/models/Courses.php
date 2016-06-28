<?php

/**
 * This is the model class for table "courses".
 *
 * The followings are the available columns in table 'courses':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $owner_user_id
 * @property string $create_date
 * @property string $status
 * @property string $price_by
 * @property double $price
 * @property integer $previous_course_id
 *
 * The followings are the available model relations:
 * @property Courses $previousCourse
 * @property Courses[] $courses
 * @property Users $ownerUser
 * @property CoursesUsers[] $coursesUsers
 * @property Lessons[] $lessons
 */
class Courses extends UActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'courses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, start_date, owner_user_id, create_date, status, price_by, price', 'required'),
			array('owner_user_id, previous_course_id', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('status, price_by', 'length', 'max'=>15),
			array('end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, start_date, end_date, owner_user_id, create_date, status, price_by, price, previous_course_id', 'safe', 'on'=>'search'),
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
			'previousCourse' => array(self::BELONGS_TO, 'Courses', 'previous_course_id'),
			'courses' => array(self::HAS_MANY, 'Courses', 'previous_course_id'),
			'ownerUser' => array(self::BELONGS_TO, 'Users', 'owner_user_id'),
			'coursesUsers' => array(self::HAS_MANY, 'CoursesUsers', 'course_id'),
			'lessons' => array(self::HAS_MANY, 'Lessons', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'owner_user_id' => 'Owner User',
			'create_date' => 'Create Date',
			'status' => 'Status',
			'price_by' => 'Price By',
			'price' => 'Price',
			'previous_course_id' => 'Previous Course',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('owner_user_id',$this->owner_user_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('price_by',$this->price_by,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('previous_course_id',$this->previous_course_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Courses the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
