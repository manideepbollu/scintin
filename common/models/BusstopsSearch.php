<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Busstops;

/**
 * BusstopsSearch represents the model behind the search form about `common\models\Busstops`.
 */
class BusstopsSearch extends Busstops
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'distance', 'created_by', 'updated_by'], 'integer'],
            [['stop_name', 'lat_coords', 'lon_coords', 'notes', 'isactive', 'created_at', 'updated_at'], 'safe'],
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
        $query = Busstops::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'distance' => $this->distance,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'stop_name', $this->stop_name])
            ->andFilterWhere(['like', 'lat_coords', $this->lat_coords])
            ->andFilterWhere(['like', 'lon_coords', $this->lon_coords])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'isactive', $this->isactive])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
