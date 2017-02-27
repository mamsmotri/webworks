<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Masters;

/**
 * MastersSearch represents the model behind the search form about `app\models\Masters`.
 */
class MastersSearch extends Masters
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PK_Masters'], 'integer'],
            [['MasterName', 'MasterAddress', 'MasterPhone', 'MasterDesq'], 'safe'],
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
        $query = Masters::find();

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
            'PK_Masters' => $this->PK_Masters,
        ]);

        $query->andFilterWhere(['like', 'MasterName', $this->MasterName])
            ->andFilterWhere(['like', 'MasterAddress', $this->MasterAddress])
            ->andFilterWhere(['like', 'MasterPhone', $this->MasterPhone])
            ->andFilterWhere(['like', 'MasterDesq', $this->MasterDesq]);

        return $dataProvider;
    }
}
