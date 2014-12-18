<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ElectiveGroups;

/**
 * ElectiveGroupsSearch represents the model behind the search form about `common\models\ElectiveGroups`.
 */
class ElectiveGroupsSearch extends ElectiveGroups
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'batch_id', 'max_subjects', 'min_subjects', 'created_by', 'updated_by'], 'integer'],
            [['group_name', 'parent_type', 'isactive', 'created_at', 'updated_at'], 'safe'],
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
        $query = ElectiveGroups::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'course_id' => $this->course_id,
            'batch_id' => $this->batch_id,
            'max_subjects' => $this->max_subjects,
            'min_subjects' => $this->min_subjects,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'group_name', $this->group_name])
            ->andFilterWhere(['like', 'parent_type', $this->parent_type])
            ->andFilterWhere(['like', 'isactive', $this->isactive]);

        return $dataProvider;
    }
}
