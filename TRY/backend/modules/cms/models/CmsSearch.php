<?php

namespace backend\modules\cms\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\cms\models\Cms;

/**
 * CmsSearch represents the model behind the search form about `backend\modules\cms\models\Cms`.
 */
class CmsSearch extends Cms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'seoTitle', 'status', 'createdOn', 'modifiedOn', 'description'], 'safe'],
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
        $query = Cms::find();

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
            'createdOn' => $this->createdOn,
            'modifiedOn' => $this->modifiedOn,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'seoTitle', $this->seoTitle])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
