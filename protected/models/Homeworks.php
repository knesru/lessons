<?php

/**
 * This is the model class for table "homeworks".
 *
 * The followings are the available columns in table 'homeworks':
 * @property integer $id
 * @property integer $user_id
 * @property integer $lesson_id
 * @property string $task
 * @property double $time_estimated
 * @property integer $progress
 * @property double $done
 * @property string $comment
 * @property integer $teacher_id
 *
 * The followings are the available model relations:
 * @property Users $user
 * @property Lessons $lesson
 * @property Users $teacher
 */
class Homeworks extends UActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'homeworks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, lesson_id, task, time_estimated, progress, done, comment, teacher_id', 'required'),
			array('user_id, lesson_id, progress, teacher_id', 'numerical', 'integerOnly'=>true),
			array('time_estimated, done', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, lesson_id, task, time_estimated, progress, done, comment, teacher_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'lesson' => array(self::BELONGS_TO, 'Lessons', 'lesson_id'),
			'teacher' => array(self::BELONGS_TO, 'Users', 'teacher_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'lesson_id' => 'Lesson',
			'task' => 'Task',
			'time_estimated' => 'Time Estimated',
			'progress' => 'Progress',
			'done' => 'Done',
			'comment' => 'Comment',
			'teacher_id' => 'Teacher',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('lesson_id',$this->lesson_id);
		$criteria->compare('task',$this->task,true);
		$criteria->compare('time_estimated',$this->time_estimated);
		$criteria->compare('progress',$this->progress);
		$criteria->compare('done',$this->done);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('teacher_id',$this->teacher_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Homeworks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
