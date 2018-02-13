<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserAlbum;

/**
 * UserAlbumSearch represents the model behind the search form about `frontend\models\UserAlbum`.
 */
class UserAlbumSearch extends UserAlbum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userId'], 'integer'],
            [['abName', 'abDescription', 'abIcon', 'status', 'createdOn', 'updatedOn'], 'safe'],
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
        //print_r(Yii::$app->user->identity->id);exit;

        $query = UserAlbum::find()->where('userId='.Yii::$app->user->identity->id);

        //echo '<pre>';print_r($query);exit;
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
            'userId' => $this->userId,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'abName', $this->abName])
            ->andFilterWhere(['like', 'abDescription', $this->abDescription])
            ->andFilterWhere(['like', 'abIcon', $this->abIcon])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
