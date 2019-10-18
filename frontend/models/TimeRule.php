<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "time_rule".
 *
 * @property int $id
 * @property int $day_id
 * @property int $time_id
 *
 * @property Day $day
 * @property Times $time
 */
class TimeRule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'time_rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day_id', 'time_id'], 'required'],
            [['day_id', 'time_id'], 'integer'],
            [['day_id'], 'exist', 'skipOnError' => true, 'targetClass' => Day::className(), 'targetAttribute' => ['day_id' => 'id']],
            [['time_id'], 'exist', 'skipOnError' => true, 'targetClass' => Times::className(), 'targetAttribute' => ['time_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day_id' => 'Day ID',
            'time_id' => 'Time ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(Day::className(), ['id' => 'day_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTime()
    {
        return $this->hasOne(Times::className(), ['id' => 'time_id']);
    }
}
