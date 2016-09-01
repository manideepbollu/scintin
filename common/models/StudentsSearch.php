<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Students;

/**
 * StudentsSearch represents the model behind the search form about `common\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'student_category', 'nationality_id', 'country_id', 'created_by', 'updated_by'], 'integer'],
            [['admission_id', 'roll_number', 'admission_date', 'first_name', 'middle_name', 'last_name', 'father_name', 'mother_name', 'date_of_birth', 'gender', 'marital_status', 'blood_group', 'birth_place', 'language', 'religion', 'address_line1', 'address_line2', 'city', 'state', 'phone1', 'phone2', 'email', 'issms_enabled', 'photo_file_name', 'photo_file_type', 'photo_element_data', 'description', 'isactive', 'created_at', 'updated_at'], 'safe'],
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
        $query = Students::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'student_category' => $this->student_category,
            'nationality_id' => $this->nationality_id,
            'country_id' => $this->country_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'admission_id', $this->admission_id])
            ->andFilterWhere(['like', 'roll_number', $this->roll_number])
            ->andFilterWhere(['like', 'admission_date', $this->admission_date])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'date_of_birth', $this->date_of_birth])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'blood_group', $this->blood_group])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'address_line1', $this->address_line1])
            ->andFilterWhere(['like', 'address_line2', $this->address_line2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'phone1', $this->phone1])
            ->andFilterWhere(['like', 'phone2', $this->phone2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'issms_enabled', $this->issms_enabled])
            ->andFilterWhere(['like', 'photo_file_name', $this->photo_file_name])
            ->andFilterWhere(['like', 'photo_file_type', $this->photo_file_type])
            ->andFilterWhere(['like', 'photo_element_data', $this->photo_element_data])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'isactive', $this->isactive]);

        return $dataProvider;
    }
}
