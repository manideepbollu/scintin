<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property integer $id
 * @property string $subject_name
 * @property string $subject_code
 * @property string $subject_type
 * @property string $iselective
 * @property integer $elective_group
 * @property string $parent_type
 * @property integer $course_id
 * @property integer $batch_id
 * @property integer $weekly_classes_max
 * @property integer $language
 * @property integer $credit_hours
 * @property integer $dependant_on
 * @property string $isactive
 * @property string $noexam
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Batches $batch
 * @property Courses $course
 * @property User $createdBy
 * @property Subjects $dependantOn
 * @property Subjects[] $subjects
 * @property ElectiveGroups $electiveGroup
 * @property User $updatedBy
 */
class Subjects extends GeneralRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['elective_group', 'course_id', 'batch_id', 'weekly_classes_max', 'language', 'credit_hours', 'dependant_on', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['subject_name', 'subject_code', 'subject_type', 'iselective', 'parent_type', 'isactive', 'noexam'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject_name' => 'Subject Name',
            'subject_code' => 'Subject Code',
            'subject_type' => 'Subject Type',
            'iselective' => 'Subject Group',
            'elective_group' => 'Elective Group',
            'parent_type' => 'Parent Type',
            'course_id' => 'Course ID',
            'batch_id' => 'Batch ID',
            'weekly_classes_max' => 'Weekly Classes Max',
            'language' => 'Language',
            'credit_hours' => 'Credit Hours',
            'dependant_on' => 'Dependant On',
            'isactive' => 'Status',
            'noexam' => 'Exam Based',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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
            case 'Course':
                $this->batch_id = null;
                break;
            case 'Batch':
                $this->course_id = null;
                break;
        }

        if($this->iselective === 'Mandatory')
            $this->elective_group = null;

        if($this->dependant_on === 'No options available')
            $this->dependant_on = null;

        return $return;
    }

    /**
     * @return array
     * - Subject type options
     */
    public function getSubjectTypes()
    {
        return ['Theory' => 'Theory', 'Practicals' => 'Practicals'];
    }

    /**
     * @return array
     * - Subject group options
     */
    public function getSubjectGroups()
    {
        return ['Mandatory' => 'Mandatory', 'Elective' => 'Elective'];
    }

    /**
     * @return array
     * - Subject status options
     */
    public function getSubjectStatus()
    {
        return ['Active' => 'Active', 'Inactive' => 'Inactive'];
    }

    /**
     * @return array
     * - Exam options
     */
    public function getExamOptions()
    {
        return ['Yes' => 'Yes', 'No' => 'No'];
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
    public function getDependantOn()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'dependant_on']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['dependant_on' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectiveGroup()
    {
        return $this->hasOne(ElectiveGroups::className(), ['id' => 'elective_group']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    /**
     * @return gives the list of parent types (hard coded values) if they are active
     */
    public static function getParentTypes()
    {
        $filter = [
            'isactive' => 'Active'
        ];

        $parentOptions=[];

        if(Courses::getSpecificCourses($filter))
            $parentOptions['Course'] = 'Course';

        if(Batches::getSpecificBatches([],$filter))
            $parentOptions['Batch'] = 'Batch';

        return $parentOptions;
    }

    /**
     * @return array
     * - Returns an array of subjects in [id => subject_name] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificSubjects($filter = [])
    {
        $subjects = null;

        $multiArray =  Subjects::find()
            ->asArray()
            ->select(['id','subject_name'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray)
            $subjects[$singleArray['id']] = $singleArray['subject_name'];

        return $subjects;
    }
}
