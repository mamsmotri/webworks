<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Drivers;

/**
 * DriversSearch represents the model behind the search form about `app\models\Drivers`.
 */
class DriversSearch extends Drivers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PK_Drivers'], 'integer'],
            [['DriverName', 'DriverCar', 'DriverPhoneNumber'], 'safe'],
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
        $query = Drivers::find();

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
            'PK_Drivers' => $this->PK_Drivers,
        ]);

        $query->andFilterWhere(['like', 'DriverName', $this->DriverName])
            ->andFilterWhere(['like', 'DriverCar', $this->DriverCar])
            ->andFilterWhere(['like', 'DriverPhoneNumber', $this->DriverPhoneNumber]);

        return $dataProvider;
    }
}
