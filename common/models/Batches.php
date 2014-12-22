<?php

namespace common\models;

use Yii;
Use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "batches".
 *
 * @property integer $id
 * @property string $batch_name
 * @property integer $course_id
 * @property integer $head_teacher
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property User $headTeacher
 * @property Courses $course
 * @property User $createdBy
 * @property User $updatedBy
 */
class Batches extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'batches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batch_name', 'course_id', 'start_date', 'end_date'], 'required'],
            [['course_id', 'head_teacher', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['batch_name', 'start_date', 'end_date'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'value' => function(){return date('d/m/Y H:i:s');}, /* Ex: 01/01/2015 22:10:05 */
            ],
            BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'batch_name' => 'Batch Name',
            'course_id' => 'Course Name',
            'head_teacher' => 'Head Teacher',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'headTeacher.username' => 'Head Teacher',
            'createdBy.username' => 'Created By',
            'updatedBy.username' => 'Updated By',
        ];
    }

    /**
     * @return array
     * - Returns an array of specific records as per the filters passed.
     * @param array $filter
     * - Takes the array of filters that can be used in Where clause of query
     * @param array $parentFilters
     * - Takes an array of filters that can be applied on it's parent data.
     */
    public static function getSpecificBatches($filter = [], $parentFilters = [])
    {
        $batches = NULL;

        $multiArray =  Batches::find()
            ->asArray()
            ->select(['id', 'batch_name', 'start_date', 'end_date'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray)
        {
            while(current($parentFilters))
            {
                $keyName = key($parentFilters);
                if(!(Batches::findOne($singleArray['id'])->course->$keyName === current($parentFilters))){
                    $flag = 1;
                    break;
                }
                next($parentFilters);

            }
            if(!isset($flag)){
                $startDate = strtotime($singleArray['start_date']);
                $endDate = strtotime($singleArray['end_date']);
                $now = strtotime('now');

                if($startDate < $now && $now < $endDate)
                    $batches[$singleArray['id']] = $singleArray['batch_name'];
            }
            else
                unset($flag);
            reset($parentFilters);
        }

        return $batches;
    }

    /**
     * @return Integer - Returns the number of batches found in the table as per the filters.
     * @param array $filter
     * - Takes the array of filters that can be used in Where clause of query
     * @param array $parentFilters
     * - Takes an array of filters that can be applied on it's parent data.
     */
    public static function getSpecificCount($filter = [], $parentFilters = [])
    {
        $batches = self::getSpecificBatches($filter = [], $parentFilters = []);
        return count($batches);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeadTeacher()
    {
        return $this->hasOne(User::className(), ['id' => 'head_teacher']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Courses::className(), ['id' => 'course_id']);
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
    public function getElectiveGroups()
    {
        return $this->hasMany(ElectiveGroups::className(), ['batch_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['batch_id' => 'id']);
    }
}
