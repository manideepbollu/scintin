<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Routes;

/**
 * RoutesSearch represents the model behind the search form about `common\models\Routes`.
 */
class RoutesSearch extends Routes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'destination_id', 'created_by', 'updated_by'], 'integer'],
            [['route_code', 'notes', 'isactive', 'created_at', 'updated_at'], 'safe'],
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
        $query = Routes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'destination_id' => $this->destination_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'route_code', $this->route_code])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'isactive', $this->isactive])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
