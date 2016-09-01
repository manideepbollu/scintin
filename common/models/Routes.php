<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "routes".
 *
 * @property integer $id
 * @property string $route_code
 * @property integer $destination_id
 * @property string $notes
 * @property string $isactive
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $autoplot
 *
 * @property User $createdBy
 * @property Busstops $destination
 * @property User $updatedBy
 * @property Routestops[] $routestops
 * @property Subscriptions[] $subscriptions
 * @property Vehicleroutes[] $vehicleroutes
 */
class Routes extends GeneralRecord
{
    public $stops;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'routes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['destination_id', 'created_by', 'updated_by', 'autoplot'], 'integer'],
            [['notes'], 'string'],
            [['route_code', 'isactive', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['stops'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route_code' => 'Route Code',
            'destination_id' => 'Destination ID',
            'notes' => 'Notes',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'autoplot' => 'Auto plot',
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
    public function getDestination()
    {
        return $this->hasOne(Busstops::className(), ['id' => 'destination_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoutestops()
    {
        return $this->hasMany(Routestops::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubscriptions()
    {
        return $this->hasMany(Subscriptions::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleroutes()
    {
        return $this->hasMany(Vehicleroutes::className(), ['route_id' => 'id']);
    }
}
