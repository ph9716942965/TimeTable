<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "holiday_rules".
 *
 * @property int $id
 * @property string $rule_name
 * @property string $day_number
 */
class HolidayRules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holiday_rules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rule_name', 'day_number'], 'required'],
            [['day_number'], 'string'],
            [['rule_name'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rule_name' => 'Rule Name',
            'day_number' => 'Day Number',
        ];
    }
}
