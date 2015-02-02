<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "busstops".
 *
 * @property integer $id
 * @property string $stop_name
 * @property string $lat_coords
 * @property string $lon_coords
 * @property float $distance
 * @property string $notes
 * @property string $isactive
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Routes[] $routes
 * @property Routestops[] $routestops
 * @property Subscriptions[] $subscriptions
 */
class Busstops extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'busstops';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by', 'updated_by'], 'integer'],
            [['distance'], 'number'],
            [['notes'], 'string'],
            [['stop_name', 'lat_coords', 'lon_coords', 'isactive', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['stop_name', 'lat_coords', 'lon_coords', 'distance', 'isactive'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stop_name' => 'Stop Name',
            'lat_coords' => 'Latitude',
            'lon_coords' => 'Longitude',
            'distance' => 'Distance (in KMs)',
            'notes' => 'Notes',
            'isactive' => 'Status',
            'created_at' => 'Created At',
            'createdBy.username' => 'Created By',
            'updated_at' => 'Updated At',
            'updatedBy.username' => 'Updated By',
        ];
    }

    /**
     * @return array
     * - status options
     */
    public function getStatusOptions()
    {
        return ['Active' => 'Active', 'Inactive' => 'Inactive'];
    }

    /**
     * @return array
     * - Returns an array of bus stops in [id => stop_name + distance] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificBusstops($filter = [])
    {
        $stops = null;

        $multiArray =  Busstops::find()
            ->asArray()
            ->select(['id', 'stop_name', 'distance'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray)
            $stops[$singleArray['id']] = $singleArray['stop_name'] .' ('. $singleArray['distance'].'kms)';
        return $stops;
    }

    /**
     * @return integer
     * - Returns the number of records satisfy the given filter.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificCount($filter = [])
    {
        $stops = self::getSpecificBusstops($filter);
        return count($stops);
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Routes::className(), ['destination_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoutestops()
    {
        return $this->hasMany(Routestops::className(), ['stop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubscriptions()
    {
        return $this->hasMany(Subscriptions::className(), ['stop_id' => 'id']);
    }
}
