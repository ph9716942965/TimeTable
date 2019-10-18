<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "day".
 *
 * @property int $id
 * @property string $name
 *
 * @property TimeRule[] $timeRules
 */
class Day extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'day';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeRules()
    {
        return $this->hasMany(TimeRule::className(), ['day_id' => 'id']);
    }
}
