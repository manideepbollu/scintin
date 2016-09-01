<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employees;

/**
 * EmployeesSearch represents the model behind the search form about `common\models\Employees`.
 */
class EmployeesSearch extends Employees
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_category', 'employee_position_id', 'employee_department_id', 'reporting_manager_id', 'employee_grade_id', 'experience_years', 'experience_months', 'children_count', 'nationality_id', 'present_country_id', 'permanent_country_id', 'created_by', 'updated_by'], 'integer'],
            [['employee_id', 'joining_date', 'first_name', 'middle_name', 'last_name', 'job_title', 'qualification', 'experience_details', 'father_name', 'mother_name', 'spouse_name', 'date_of_birth', 'gender', 'marital_status', 'blood_group', 'birth_place', 'language', 'religion', 'present_address_line1', 'present_address_line2', 'present_city', 'present_state', 'present_phone1', 'present_phone2', 'present_mobile', 'email', 'fax', 'permanent_address_line1', 'permanent_address_line2', 'permanent_city', 'permanent_state', 'permanent_phone1', 'permanent_phone2', 'photo_file_name', 'photo_file_type', 'photo_element_data', 'description', 'isactive', 'created_at', 'updated_at'], 'safe'],
            [['driverAdditionalDetails'], 'safe'],
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
        $query = Employees::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'employee_category' => $this->employee_category,
            'employee_position_id' => $this->employee_position_id,
            'employee_department_id' => $this->employee_department_id,
            'reporting_manager_id' => $this->reporting_manager_id,
            'employee_grade_id' => $this->employee_grade_id,
            'experience_years' => $this->experience_years,
            'experience_months' => $this->experience_months,
            'children_count' => $this->children_count,
            'nationality_id' => $this->nationality_id,
            'present_country_id' => $this->present_country_id,
            'permanent_country_id' => $this->permanent_country_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'employee_id', $this->employee_id])
            ->andFilterWhere(['like', 'joining_date', $this->joining_date])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'job_title', $this->job_title])
            ->andFilterWhere(['like', 'qualification', $this->qualification])
            ->andFilterWhere(['like', 'experience_details', $this->experience_details])
            ->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'spouse_name', $this->spouse_name])
            ->andFilterWhere(['like', 'date_of_birth', $this->date_of_birth])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'blood_group', $this->blood_group])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'present_address_line1', $this->present_address_line1])
            ->andFilterWhere(['like', 'present_address_line2', $this->present_address_line2])
            ->andFilterWhere(['like', 'present_city', $this->present_city])
            ->andFilterWhere(['like', 'present_state', $this->present_state])
            ->andFilterWhere(['like', 'present_phone1', $this->present_phone1])
            ->andFilterWhere(['like', 'present_phone2', $this->present_phone2])
            ->andFilterWhere(['like', 'present_mobile', $this->present_mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'permanent_address_line1', $this->permanent_address_line1])
            ->andFilterWhere(['like', 'permanent_address_line2', $this->permanent_address_line2])
            ->andFilterWhere(['like', 'permanent_city', $this->permanent_city])
            ->andFilterWhere(['like', 'permanent_state', $this->permanent_state])
            ->andFilterWhere(['like', 'permanent_phone1', $this->permanent_phone1])
            ->andFilterWhere(['like', 'permanent_phone2', $this->permanent_phone2])
            ->andFilterWhere(['like', 'photo_file_name', $this->photo_file_name])
            ->andFilterWhere(['like', 'photo_file_type', $this->photo_file_type])
            ->andFilterWhere(['like', 'photo_element_data', $this->photo_element_data])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'isactive', $this->isactive]);

        return $dataProvider;
    }

    public function driverSearch($params)
    {
        $query = Employees::find()
        ->where(['job_title' => 'Driver'])
        ->joinWith(['driverAdditionalDetails']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'licence_number', $this->licence_number])
            ->andFilterWhere(['like', 'licence_issue_date', $this->licence_issue_date])
            ->andFilterWhere(['like', 'licence_renewal_date', $this->licence_renewal_date])
            ->andFilterWhere(['like', 'insurance_status', $this->insurance_status])
            ->andFilterWhere(['like', 'insurance_number', $this->insurance_number])
            ->andFilterWhere(['like', 'insurance_issue_date', $this->insurance_issue_date])
            ->andFilterWhere(['like', 'insurance_renewal_date', $this->insurance_renewal_date])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
