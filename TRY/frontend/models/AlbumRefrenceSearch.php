<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AlbumRefrence;

/**
 * AlbumRefrenceSearch represents the model behind the search form about `frontend\models\AlbumRefrence`.
 */
class AlbumRefrenceSearch extends AlbumRefrence
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'albumId', 'photoOrder', 'albumCount'], 'integer'],
            [['pics', 'createdOn', 'updatedOn'], 'safe'],
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
        $query = AlbumRefrence::find();

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
            'albumId' => $this->albumId,
            'photoOrder' => $this->photoOrder,
            'albumCount' => $this->albumCount,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'pics', $this->pics]);

        return $dataProvider;
    }
}
