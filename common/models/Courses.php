<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

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

    /**
     * @return Array - All the active courses in [id => course_name] pair.
     * Suitable for displaying dropdown lists. Displayed in create Batches form.
     */
    public static function getActiveCourses()
    {
        $courses = NULL;

        $multiArray =  Courses::find()
            ->asArray()
            ->select(['id','course_name'])
            ->where([
                'isactive' => 'Active',
            ])
           ->all();

        foreach($multiArray as $singleArray)
            $courses[$singleArray['id']] = $singleArray['course_name'];

        return $courses;
    }

    /**
     * @return Integer - Returns the number of active courses available in the table.
     */
    public static function getActiveCount()
    {
        $courses = self::getActiveCourses();
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

}
