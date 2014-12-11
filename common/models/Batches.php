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
     * @return Array - All the active batches in [id => course_name] pair.
     * Suitable for displaying dropdown lists. Displayed in create Subjects form.
     */
    public static function getActiveBatches()
    {
        $batches = NULL;

        $multiArray =  Batches::find()
            ->asArray()
            ->select(['id', 'batch_name', 'start_date', 'end_date'])
            ->all();

        foreach($multiArray as $singleArray)
        {
            if(Batches::findOne($singleArray['id'])->course->isactive === 'Active')
            {
                $startDate = strtotime($singleArray['start_date']);
                $endDate = strtotime($singleArray['end_date']);
                $now = strtotime('now');

                if($startDate < $now && $now < $endDate)
                    $batches[$singleArray['id']] = $singleArray['batch_name'];
            }
        }

        return $batches;
    }

    /**
     * @return Integer - Returns the number of active batches available in the table.
     */
    public static function getActiveCount()
    {
        $batches = self::getActiveBatches();
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
}
