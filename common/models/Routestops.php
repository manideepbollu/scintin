<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "routestops".
 *
 * @property integer $id
 * @property integer $route_id
 * @property integer $stop_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property User $updatedBy
 * @property User $createdBy
 * @property Routes $route
 * @property Busstops $stop
 */

class Routestops extends GeneralRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'routestops';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route_id', 'stop_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route_id' => 'Route ID',
            'stop_id' => 'Stop ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return array
     * - Returns an array of route stops in [id => stop_name] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificRoutestops($filter = [])
    {
        $stops[] = null;
        $i = 0;

        $multiArray =  Routestops::find()
            ->asArray()
            ->select(['stop_id'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray){
            $stops[$i] = $singleArray['stop_id'];
            $i++;
        }

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
        $stops = self::getSpecificRoutestops($filter);
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
    public function getRoute()
    {
        return $this->hasOne(Routes::className(), ['id' => 'route_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStop()
    {
        return $this->hasOne(Busstops::className(), ['id' => 'stop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
