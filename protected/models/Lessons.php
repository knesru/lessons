<?php

/**
 * This is the model class for table "lessons".
 *
 * The followings are the available columns in table 'lessons':
 * @property integer $id
 * @property integer $course_id
 * @property string $date_start
 * @property string $date_finished
 * @property integer $paid
 * @property string $description
 * @property string $name
 * @property integer $price
 *
 * The followings are the available model relations:
 * @property Homeworks[] $homeworks
 * @property Courses $course
 * @property LessonsUsers[] $lessonsUsers
 */
class Lessons extends UActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lessons';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, date_start, date_finished, paid, description, name, price', 'required'),
			array('course_id, paid, price', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, course_id, date_start, date_finished, paid, description, name, price', 'safe', 'on'=>'search'),
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
			'homeworks' => array(self::HAS_MANY, 'Homeworks', 'lesson_id'),
			'prevCourse' => array(self::BELONGS_TO, 'Courses', 'course_id'),
			'lessonsUsers' => array(self::HAS_MANY, 'LessonsUsers', 'lesson_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_id' => 'Course',
			'date_start' => 'Date Start',
			'date_finished' => 'Date Finished',
			'paid' => 'Paid',
			'description' => 'Description',
			'name' => 'Name',
			'price' => 'Price',
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
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_finished',$this->date_finished,true);
		$criteria->compare('paid',$this->paid);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lessons the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
