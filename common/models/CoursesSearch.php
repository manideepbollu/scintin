<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Courses;

/**
 * CoursesSearch represents the model behind the search form about `common\models\Courses`.
 */
class CoursesSearch extends Courses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by'], 'integer'],
            [['course_name', 'section_name', 'course_code', 'created_at', 'updated_at', 'isactive', 'grading_system', 'elective_enabled'], 'safe'],
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
        $query = Courses::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'isactive' => $this->isactive,
            'grading_system' => $this->grading_system,
            'elective_enabled' => $this->elective_enabled,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'course_name', $this->course_name])
            ->andFilterWhere(['like', 'section_name', $this->section_name])
            ->andFilterWhere(['like', 'course_code', $this->course_code]);

        return $dataProvider;
    }
}
