<?php

namespace app\modules\trip\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "trip_events".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property string $start_date
 * @property string $end_date
 * @property string $location
 * @property integer $price
 * @property integer $organizer_id
 * @property string $description
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class Event extends \yii\db\ActiveRecord
{
    public $start_time,$end_time;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trip_events';
    }

    public function behaviors()
	   {
		    return [
			     [
				      'class' => TimestampBehavior::className(),
				      'createdAtAttribute' => 'created_at',
				      'updatedAtAttribute' => 'updated_at',
				      'value' => new Expression('UNIX_TIMESTAMP(NOW())'),
			     ],
           [
				      'class' => BlameableBehavior::className(),
				      'createdByAttribute' => 'created_by',
				      'updatedByAttribute' => 'updated_by',
			     ],
		    ];
	   }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'price', 'organizer_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['start_date', 'end_date', 'location', 'description'], 'required'],
            [['title', 'start_date', 'end_date'], 'safe'],
            [['description'], 'string'],
            [['location'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Judul'),
            'category_id' => Yii::t('app', 'Kategori'),
            'start_date' => Yii::t('app', 'Tanggal mulai'),
            'end_date' => Yii::t('app', 'Tanggal Berakhir'),
            'location' => Yii::t('app', 'Lokasi'),
            'price' => Yii::t('app', 'Harga'),
            'organizer_id' => Yii::t('app', 'Organizer ID'),
            'description' => Yii::t('app', 'Deskripsi'),
        ];
    }


    /*
    * before Safe
    */
    public function beforeSave($insert){
       $this->start_date =  $this->changeDateToSql($this->start_date);
       $this->end_date   = $this->changeDateToSql($this->end_date);
       return parent::beforeSave($insert);
    }

    /* function for Change date to Sql Date */
    public function changeDateToSql($date){
      $date = str_replace('/', '-', $date);
      return date('Y-m-d', strtotime($date));
    }
	
	/* function for Display date*/
    public function displayDate($date){
      $date = str_replace('-', '/', $date);
      return date('d/m/Y', strtotime($date));
    }
}
