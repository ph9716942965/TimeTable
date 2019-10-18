<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TimeRule;

/**
 * TimeRuleSearch represents the model behind the search form about `frontend\models\TimeRule`.
 */
class TimeRuleSearch extends TimeRule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'day_id', 'time_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TimeRule::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'day_id' => $this->day_id,
            'time_id' => $this->time_id,
        ]);

        return $dataProvider;
    }
}
