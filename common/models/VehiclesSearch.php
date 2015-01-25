<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vehicles;

/**
 * VehiclesSearch represents the model behind the search form about `common\models\Vehicles`.
 */
class VehiclesSearch extends Vehicles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_category', 'assigned_driver', 'capacity', 'created_by', 'updated_by'], 'integer'],
            [['vehicle_number', 'vehicle_code', 'vehicle_type', 'date_of_registration', 'expiry_date', 'insurance_renewal_date', 'notes', 'isactive', 'created_at', 'updated_at'], 'safe'],
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
        $query = Vehicles::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'vehicle_category' => $this->vehicle_category,
            'assigned_driver' => $this->assigned_driver,
            'capacity' => $this->capacity,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'vehicle_number', $this->vehicle_number])
            ->andFilterWhere(['like', 'vehicle_code', $this->vehicle_code])
            ->andFilterWhere(['like', 'vehicle_type', $this->vehicle_type])
            ->andFilterWhere(['like', 'date_of_registration', $this->date_of_registration])
            ->andFilterWhere(['like', 'expiry_date', $this->expiry_date])
            ->andFilterWhere(['like', 'insurance_renewal_date', $this->insurance_renewal_date])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'isactive', $this->isactive])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
