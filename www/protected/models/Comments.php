<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property string $comm_id
 * @property string $comm_text
 * @property string $comm_date
 * @property string $comm_author
 * @property string $comm_event
 *
 * The followings are the available model relations:
 * @property Events $commEvent
 * @property Users $commAuthor
 */
class Comments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comm_text, comm_date, comm_author, comm_event', 'required'),
			array('comm_text', 'length', 'max'=>255),
			array('comm_date', 'length', 'max'=>20),
			array('comm_author, comm_event', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('comm_id, comm_text, comm_date, comm_author, comm_event', 'safe', 'on'=>'search'),
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
			'commEvent' => array(self::BELONGS_TO, 'Events', 'comm_event'),
			'commAuthor' => array(self::BELONGS_TO, 'Users', 'comm_author'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comm_id' => 'Comm',
			'comm_text' => 'Comm Text',
			'comm_date' => 'Comm Date',
			'comm_author' => 'Comm Author',
			'comm_event' => 'Comm Event',
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

		$criteria->compare('comm_id',$this->comm_id,true);
		$criteria->compare('comm_text',$this->comm_text,true);
		$criteria->compare('comm_date',$this->comm_date,true);
		$criteria->compare('comm_author',$this->comm_author,true);
		$criteria->compare('comm_event',$this->comm_event,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
