<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Subjects;

/**
 * SubjectsSearch represents the model behind the search form about `common\models\Subjects`.
 */
class SubjectsSearch extends Subjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'elective_group', 'course_id', 'batch_id', 'weekly_classes_max', 'language', 'credit_hours', 'dependant_on', 'created_by', 'updated_by'], 'integer'],
            [['subject_name', 'subject_code', 'subject_type', 'iselective', 'parent_type', 'isactive', 'noexam', 'created_at', 'updated_at'], 'safe'],
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
        $query = Subjects::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'elective_group' => $this->elective_group,
            'course_id' => $this->course_id,
            'batch_id' => $this->batch_id,
            'weekly_classes_max' => $this->weekly_classes_max,
            'language' => $this->language,
            'credit_hours' => $this->credit_hours,
            'dependant_on' => $this->dependant_on,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'subject_name', $this->subject_name])
            ->andFilterWhere(['like', 'subject_code', $this->subject_code])
            ->andFilterWhere(['like', 'subject_type', $this->subject_type])
            ->andFilterWhere(['like', 'iselective', $this->iselective])
            ->andFilterWhere(['like', 'parent_type', $this->parent_type])
            ->andFilterWhere(['like', 'isactive', $this->isactive])
            ->andFilterWhere(['like', 'noexam', $this->noexam]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchWithOrFilter($params)
    {
        $query = Subjects::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'subject_name', $this->subject_name])
            ->orFilterWhere(['like', 'subject_code', $this->subject_code])
            ->orFilterWhere(['like', 'subject_type', $this->subject_type])
            ->orFilterWhere(['like', 'course_id', $this->course_id])
            ->orFilterWhere(['like', 'batch_id', $this->batch_id])
            ->orFilterWhere(['like', 'iselective', $this->iselective])
            ->orFilterWhere(['like', 'parent_type', $this->parent_type])
            ->orFilterWhere(['like', 'noexam', $this->noexam]);

        $query->andFilterWhere([
            'id' => $this->id,
            'elective_group' => $this->elective_group,
            'weekly_classes_max' => $this->weekly_classes_max,
            'language' => $this->language,
            'credit_hours' => $this->credit_hours,
            'dependant_on' => $this->dependant_on,
            'isactive' => $this->isactive,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
