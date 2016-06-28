<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $access_role
 * @property string $status
 * @property string $check_code
 * @property string $comment
 * @property string $date_created
 * @property string $last_ip
 * @property string $phone
 * @property string $address
 *
 * The followings are the available model relations:
 * @property Courses[] $courses
 * @property CoursesUsers[] $coursesUsers
 * @property Homeworks[] $homeworks
 * @property Homeworks[] $homeworks1
 * @property LessonsUsers[] $lessonsUsers
 * @property UsersVisibility[] $usersVisibilities
 * @property UsersVisibility[] $usersVisibilities1
 */
class Users extends UActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, access_role, status, check_code, comment, date_created, last_ip, phone, address', 'required'),
			array('name, email', 'length', 'max'=>255),
			array('password, check_code', 'length', 'max'=>50),
			array('access_role, status', 'length', 'max'=>15),
			array('last_ip', 'length', 'max'=>40),
			array('phone', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, password, access_role, status, check_code, comment, date_created, last_ip, phone, address', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Courses', 'owner_user_id'),
			'coursesUsers' => array(self::HAS_MANY, 'CoursesUsers', 'user_id'),
			'homeworks' => array(self::HAS_MANY, 'Homeworks', 'user_id'),
			'homeworks1' => array(self::HAS_MANY, 'Homeworks', 'teacher_id'),
			'lessonsUsers' => array(self::HAS_MANY, 'LessonsUsers', 'user_id'),
			'usersVisibilities' => array(self::HAS_MANY, 'UsersVisibility', 'viewer_user_id'),
			'usersVisibilities1' => array(self::HAS_MANY, 'UsersVisibility', 'user_id'),
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
			'email' => 'Email',
			'password' => 'Password',
			'access_role' => 'Access Role',
			'status' => 'Status',
			'check_code' => 'Check Code',
			'comment' => 'Comment',
			'date_created' => 'Date Created',
			'last_ip' => 'Last Ip',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('access_role',$this->access_role,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('check_code',$this->check_code,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('last_ip',$this->last_ip,true);
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
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
