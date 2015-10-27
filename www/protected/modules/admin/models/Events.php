<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property string $event_id
 * @property string $event_title
 * @property string $event_description
 * @property string $event_image
 * @property string $event_x
 * @property string $event_y
 * @property string $event_date
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property EventTag[] $eventTags
 * @property Favorites[] $favorites
 */
class Events extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_title, event_description, event_image, event_date', 'required'),
			array('event_title, event_image', 'length', 'max'=>255),
			array('event_x, event_y', 'length', 'max'=>5),
			array('event_date', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('event_id, event_title, event_description, event_image, event_x, event_y, event_date', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comments', 'comm_event'),
			'eventTags' => array(self::HAS_MANY, 'EventTag', 'et_event'),
			'favorites' => array(self::HAS_MANY, 'Favorites', 'fav_event'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'event_id' => 'Event',
			'event_title' => 'Event Title',
			'event_description' => 'Event Description',
			'event_image' => 'Event Image',
			'event_x' => 'Event X',
			'event_y' => 'Event Y',
			'event_date' => 'Event Date',
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

		$criteria->compare('event_id',$this->event_id,true);
		$criteria->compare('event_title',$this->event_title,true);
		$criteria->compare('event_description',$this->event_description,true);
		$criteria->compare('event_image',$this->event_image,true);
		$criteria->compare('event_x',$this->event_x,true);
		$criteria->compare('event_y',$this->event_y,true);
		$criteria->compare('event_date',$this->event_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
