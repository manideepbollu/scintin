<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "elective_groups".
 *
 * @property integer $id
 * @property string $group_name
 * @property string $parent_type
 * @property integer $course_id
 * @property integer $batch_id
 * @property integer $max_subjects
 * @property integer $min_subjects
 * @property string $isactive
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Batches $batch
 * @property Courses $course
 * @property User $createdBy
 * @property User $updatedBy
 * @property Subjects[] $subjects
 */
class ElectiveGroups extends GeneralRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'elective_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'batch_id', 'max_subjects', 'min_subjects', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['group_name', 'parent_type', 'isactive'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $return = parent::beforeSave($insert);

        switch($this->parent_type)
        {
            case 'Global':
                $this->course_id = null;
                $this->batch_id = null;
                break;
            case 'Course':
                $this->batch_id = null;
                break;
            case 'Batch':
                $this->course_id = null;
                break;
        }

        return $return;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
            'parent_type' => 'Parent Type',
            'course_id' => 'Course ID',
            'batch_id' => 'Batch ID',
            'max_subjects' => 'Max Subjects',
            'min_subjects' => 'Min Subjects',
            'isactive' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'createdBy.username' => 'Created By',
            'updatedBy.username' => 'Updated By'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatch()
    {
        return $this->hasOne(Batches::className(), ['id' => 'batch_id']);
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
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['elective_group' => 'id']);
    }

    /**
     * @return array
     * - Elective group parent options
     */
    public function getParentOptions()
    {
        return ['Global' => 'Global', 'Course' => 'Course', 'Batch' => 'Batch'];
    }

    /**
     * @return array
     * - Returns an array of ElectiveGroups in [id => group_name] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificElectiveGroups($filter = [])
    {
        $electiveGroups = null;
        $multiArray = ElectiveGroups::find()
            ->asArray()
            ->select(['id','group_name'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray){
            $electiveGroups[$singleArray['id']] = $singleArray['group_name'];
        }
        return $electiveGroups;
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
        $electiveGroups = self::getSpecificElectiveGroups($filter);
        return count($electiveGroups);
    }
}
