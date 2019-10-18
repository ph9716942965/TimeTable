<?php

namespace frontend\models;
use yii\behaviors\AttributeBehavior;
use Yii;

/**
 * This is the model class for table "holiday_date".
 *
 * @property int $id
 * @property string $date
 */
class HolidayDate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holiday_date';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['date'], 'safe'],
        ];
    }

    public function afterFind() {
        parent::afterFind ();
       // $this->date=Yii::$app->formatter->asDate($this->date);
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date=Yii::$app->formatter->asDate($this->date, 'php:Y-m-d');
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
        ];
    }
}
