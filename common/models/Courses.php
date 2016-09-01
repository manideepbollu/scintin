<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property integer $id
 * @property string $course_name
 * @property string $section_name
 * @property string $course_code
 * @property string $isactive
 * @property string $grading_system
 * @property string $elective_enabled
 * @property string $created_at
 * @property User $created_by
 * @property string $updated_at
 * @property User $updated_by
 *
 * @property Batches[] $batches
 * @property User $updatedBy
 * @property User $createdBy
 */
class Courses extends GeneralRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_name'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['course_name', 'section_name', 'course_code', 'isactive', 'grading_system', 'elective_enabled'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_name' => 'Course Name',
            'section_name' => 'Section Name',
            'course_code' => 'Course Code',
            'isactive' => 'Status',
            'grading_system' => 'Grading System',
            'elective_enabled' => 'Electives',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'createdBy.username' => 'Created By',
            'updatedBy.username' => 'Updated By',
        ];
    }

    /**
     * @return array
     * - Course status options
     */
    public function getCourseStatus()
    {
        return ['Active' => 'Active', 'Inactive' => 'Inactive'];
    }

    /**
     * @return array
     * - Elective allowed status options
     */
    public function getElectiveStatus()
    {
        return ['Allowed' => 'Allowed', 'Not allowed' => 'Not allowed'];
    }

    /**
     * @return array
     * - Grading systems available
     */
    public function getGradingSystems()
    {
        return ['General' => 'General', 'CBSE' => 'CBSE', 'ICSE' => 'ICSE'];
    }

    /**
     * @return array
     * - Returns an array of courses in [id => course_name] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificCourses($filter = [])
    {
        $courses = null;

        $multiArray =  Courses::find()
            ->asArray()
            ->select(['id','course_name'])
            ->where($filter)
           ->all();

        foreach($multiArray as $singleArray)
            $courses[$singleArray['id']] = $singleArray['course_name'];

        return $courses;
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
        $courses = self::getSpecificCourses($filter);
        return count($courses);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatches()
    {
        return $this->hasMany(Batches::className(), ['course_id' => 'id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElectiveGroups()
    {
        return $this->hasMany(ElectiveGroups::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['course_id' => 'id']);
    }

}
