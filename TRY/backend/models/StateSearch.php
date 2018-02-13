<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\State;

/**
 * StateSearch represents the model behind the search form about `backend\models\State`.
 */
class StateSearch extends State
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id'], 'integer'],
            [['state_code', 'name', 'status', 'created_on', 'modified_on', 'ip'], 'safe'],
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
        $query = State::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
            'created_on' => $this->created_on,
            'modified_on' => $this->modified_on,
        ]);

        $query->andFilterWhere(['like', 'state_code', $this->state_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
