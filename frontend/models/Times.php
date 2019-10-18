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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time_from', 'time_to'], 'required'],
            [['time_from', 'time_to'], 'safe'],
        ];
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeRules()
    {
        return $this->hasMany(TimeRule::className(), ['time_id' => 'id']);
    }
}
