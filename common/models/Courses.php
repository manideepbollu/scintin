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
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Batches[] $batches
 */
class Courses extends \yii\db\ActiveRecord
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBatches()
    {
        return $this->hasMany(Batches::className(), ['course_id' => 'id']);
    }

    /**
     * @return Array - Course status in readable text
     */
    public function getCourseStatus()
    {
        return ['Active' => 'Active', 'Inactive' => 'Inactive'];
    }

    /**
     * @return Array - whether the electives allowed or not in this course
     */
    public function getElectiveStatus()
    {
        return ['Allowed' => 'Allowed', 'Not allowed' => 'Not allowed'];
    }

    /**
     * @return Array - Grading system status
     */
    public function getGradingSystems()
    {
        return ['General' => 'General', 'CBSE' => 'CBSE', 'ICSE' => 'ICSE'];
    }

    public static function getList(){

        $courses;

        $multiArray =  Courses::find()
            ->asArray()
            ->select(['id','course_name'])
           ->all();

        foreach($multiArray as $singleArray)
            $courses[$singleArray['id']] = $singleArray['course_name'];

        return $courses;
    }
}
