<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vehicles".
 *
 * @property integer $id
 * @property string $vehicle_number
 * @property string $vehicle_code
 * @property string $vehicle_type
 * @property integer $vehicle_category
 * @property string $date_of_registration
 * @property string $expiry_date
 * @property string $insurance_renewal_date
 * @property integer $assigned_driver
 * @property integer $capacity
 * @property string $notes
 * @property string $isactive
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Subscriptions[] $subscriptions
 * @property Vehicleroutes[] $vehicleroutes
 * @property User $createdBy
 * @property Employees $assignedDriver
 * @property User $updatedBy
 */
class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_category', 'assigned_driver', 'capacity', 'created_by', 'updated_by'], 'integer'],
            [['notes'], 'string'],
            [['vehicle_number', 'vehicle_code', 'vehicle_type', 'date_of_registration', 'expiry_date', 'insurance_renewal_date', 'isactive', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_number' => 'Vehicle Number',
            'vehicle_code' => 'Vehicle Code',
            'vehicle_type' => 'Vehicle Type',
            'vehicle_category' => 'Vehicle Category',
            'date_of_registration' => 'Date Of Registration',
            'expiry_date' => 'Expiry Date',
            'insurance_renewal_date' => 'Insurance Renewal',
            'assigned_driver' => 'Assigned Driver',
            'capacity' => 'Capacity',
            'notes' => 'Notes',
            'isactive' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubscriptions()
    {
        return $this->hasMany(Subscriptions::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleroutes()
    {
        return $this->hasMany(Vehicleroutes::className(), ['vehicle_id' => 'id']);
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
    public function getAssignedDriver()
    {
        return $this->hasOne(Employees::className(), ['id' => 'assigned_driver']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
