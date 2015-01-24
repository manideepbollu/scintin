<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Guardians;

/**
 * GuardiansSearch represents the model behind the search form about `common\models\Guardians`.
 */
class GuardiansSearch extends Guardians
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'child_admission_id', 'income', 'office_country_id', 'Residence_country_id', 'created_by', 'updated_by'], 'integer'],
            [['first_name', 'last_name', 'relation', 'date_of_birth', 'occupation', 'education', 'email', 'office_phone', 'residence_phone', 'mobile_phone', 'fax', 'office_address_line1', 'office_address_line2', 'office_city', 'office_state', 'Residence_address_line1', 'Residence_address_line2', 'Residence_city', 'Residence_state', 'description', 'isactive', 'created_at', 'updated_at'], 'safe'],
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
        $query = Guardians::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'child_admission_id' => $this->child_admission_id,
            'income' => $this->income,
            'office_country_id' => $this->office_country_id,
            'Residence_country_id' => $this->Residence_country_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'relation', $this->relation])
            ->andFilterWhere(['like', 'date_of_birth', $this->date_of_birth])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'office_phone', $this->office_phone])
            ->andFilterWhere(['like', 'residence_phone', $this->residence_phone])
            ->andFilterWhere(['like', 'mobile_phone', $this->mobile_phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'office_address_line1', $this->office_address_line1])
            ->andFilterWhere(['like', 'office_address_line2', $this->office_address_line2])
            ->andFilterWhere(['like', 'office_city', $this->office_city])
            ->andFilterWhere(['like', 'office_state', $this->office_state])
            ->andFilterWhere(['like', 'Residence_address_line1', $this->Residence_address_line1])
            ->andFilterWhere(['like', 'Residence_address_line2', $this->Residence_address_line2])
            ->andFilterWhere(['like', 'Residence_city', $this->Residence_city])
            ->andFilterWhere(['like', 'Residence_state', $this->Residence_state])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'isactive', $this->isactive]);

        return $dataProvider;
    }
}
