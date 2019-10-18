<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "times".
 *
 * @property int $id
 * @property string $time_from
 * @property string $time_to
 *
 * @property TimeRule[] $timeRules
 */
class Times extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'times';
    }

    const START = '06:00:00';
    const END   = '20:00:00';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time_from', 'time_to'], 'required'],
            [['time_from', 'time_to'], 'safe'],
            ['time_from', 'validTime'],
            ['time_to', 'compareDates'],
        ];
        
    }

    public function validTime() {
        if (strtotime(Times::START) >  strtotime($this->time_from)) {
            $this->addError('time_from', 'GolfCourse Are not open at this time');
        } if (strtotime(Times::END) <  strtotime($this->time_to)) {
            $this->addError('time_to', 'GolfCourse Are Closed at this time');
        }
    }

    public function compareDates() {
        if (!$this->hasErrors() && strtotime($this->time_to) <= strtotime($this->time_from)) {
            $this->addError('time_to', 'End Time is not valid.');
        }
    }




    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time_from' => 'Time From',
            'time_to' => 'Time To',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->time_from=Yii::$app->formatter->asDate($this->time_from, 'php:H:i:s');
            $this->time_to=Yii::$app->formatter->asDate($this->time_to, 'php:H:i:s');
            return true;
        } else {
            return false;
        }
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeRules()
    {
        return $this->hasMany(TimeRule::className(), ['time_id' => 'id']);
    }
}
