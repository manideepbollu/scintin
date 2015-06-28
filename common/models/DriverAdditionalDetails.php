<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "driver_additional_details".
 *
 * @property integer $id
 * @property integer $employee_id
 * @property string $licence_number
 * @property string $licence_issue_date
 * @property string $licence_renewal_date
 * @property string $insurance_number
 * @property string $insurance_issue_date
 * @property string $insurance_renewal_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property Employees $employee
 * @property User $updatedBy
 */
class DriverAdditionalDetails extends \common\models\GeneralRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver_additional_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'created_by', 'updated_by'], 'integer'],
            [['licence_number', 'licence_issue_date', 'licence_renewal_date', 'insurance_number', 'insurance_issue_date', 'insurance_renewal_date', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['licence_number', 'licence_issue_date',], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'licence_number' => 'Licence Number',
            'licence_issue_date' => 'Licence Issue Date',
            'licence_renewal_date' => 'Licence Renewal Date',
            'insurance_number' => 'Insurance Number',
            'insurance_issue_date' => 'Insurance Issue Date',
            'insurance_renewal_date' => 'Insurance Renewal Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employees::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
