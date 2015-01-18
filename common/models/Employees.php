<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $employee_id
 * @property string $joining_date
 * @property integer $employee_category
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $job_title
 * @property integer $employee_position_id
 * @property integer $employee_department_id
 * @property integer $reporting_manager_id
 * @property integer $employee_grade_id
 * @property string $qualification
 * @property string $experience_details
 * @property integer $experience_years
 * @property integer $experience_months
 * @property string $father_name
 * @property string $mother_name
 * @property string $spouse_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string $marital_status
 * @property integer $children_count
 * @property string $blood_group
 * @property string $birth_place
 * @property integer $nationality_id
 * @property string $language
 * @property string $religion
 * @property string $present_address_line1
 * @property string $present_address_line2
 * @property string $present_city
 * @property string $present_state
 * @property integer $present_country_id
 * @property string $present_phone1
 * @property string $present_phone2
 * @property string $present_mobile
 * @property string $email
 * @property string $fax
 * @property string $permanent_address_line1
 * @property string $permanent_address_line2
 * @property string $permanent_city
 * @property string $permanent_state
 * @property integer $permanent_country_id
 * @property string $permanent_phone1
 * @property string $permanent_phone2
 * @property string $photo_file_name
 * @property string $photo_file_type
 * @property resource $photo_element_data
 * @property string $description
 * @property string $isactive
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $photo_file_size
 * @property string $signup_request_token
 * @property file $file
 * @property boolean $copyPresentAddress
 */
class Employees extends GeneralRecord
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @var copy present
     */

    public $copyPresentAddress;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($params)
    {
        $varl = false;
        if ($this->file = UploadedFile::getInstance($this, 'file')){
            if ($this->validate()) {
                $this->photo_file_name = $this->file->name;
                $this->photo_file_type = $this->file->type;
                $this->photo_file_size = $this->file->size;
                $this->photo_element_data = file_get_contents($this->file->tempName);
            }
            else{
                Yii::$app->session->setFlash('danger', 'There was a <b>problem while uploading the photo</b>, please check the file and try again. (Please note: Uploading file should be less than 4MB in size');
                return false;
            }
        }

        return parent::beforeSave($params);
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_category', 'employee_position_id', 'employee_department_id', 'reporting_manager_id', 'employee_grade_id', 'experience_years', 'experience_months', 'children_count', 'nationality_id', 'present_country_id', 'permanent_country_id', 'photo_file_size', 'created_by', 'updated_by'], 'integer'],
            [['experience_details', 'photo_element_data', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
            [['employee_id', 'joining_date', 'first_name', 'middle_name', 'last_name', 'job_title', 'qualification', 'father_name', 'mother_name', 'spouse_name', 'date_of_birth', 'gender', 'marital_status', 'blood_group', 'birth_place', 'language', 'religion', 'present_address_line1', 'present_address_line2', 'present_city', 'present_state', 'present_phone1', 'present_phone2', 'present_mobile', 'email', 'fax', 'permanent_address_line1', 'permanent_address_line2', 'permanent_city', 'permanent_state', 'permanent_phone1', 'permanent_phone2', 'photo_file_name', 'photo_file_type', 'isactive'], 'string', 'max' => 255],
            [['employee_id','first_name','last_name','job_title','employee_category','employee_position_id','employee_department_id','reporting_manager_id','employee_grade_id','joining_date','qualification','experience_years','experience_months','father_name','date_of_birth','gender','nationality_id','present_address_line1','present_city', 'present_state','present_country_id','present_phone1','email'],'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'joining_date' => 'Joining Date',
            'employee_category' => 'Employee Category',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'job_title' => 'Job Title',
            'employee_position_id' => 'Employee Position ID',
            'employee_department_id' => 'Employee Department ID',
            'reporting_manager_id' => 'Reporting Manager ID',
            'employee_grade_id' => 'Employee Grade ID',
            'qualification' => 'Qualification',
            'experience_details' => 'Experience Details',
            'experience_years' => 'Experience Years',
            'experience_months' => 'Experience Months',
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'spouse_name' => 'Spouse Name',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'marital_status' => 'Marital Status',
            'children_count' => 'Children Count',
            'blood_group' => 'Blood Group',
            'birth_place' => 'Birth Place',
            'nationality_id' => 'Nationality ID',
            'language' => 'Language',
            'religion' => 'Religion',
            'present_address_line1' => 'Present Address Line1',
            'present_address_line2' => 'Present Address Line2',
            'present_city' => 'Present City',
            'present_state' => 'Present State',
            'present_country_id' => 'Present Country ID',
            'present_phone1' => 'Present Phone1',
            'present_phone2' => 'Present Phone2',
            'present_mobile' => 'Present Mobile',
            'email' => 'Email',
            'fax' => 'Fax',
            'copyPresentAddress' => 'Same as Present Address',
            'permanent_address_line1' => 'Permanent Address Line1',
            'permanent_address_line2' => 'Permanent Address Line2',
            'permanent_city' => 'Permanent City',
            'permanent_state' => 'Permanent State',
            'permanent_country_id' => 'Permanent Country ID',
            'permanent_phone1' => 'Permanent Phone1',
            'permanent_phone2' => 'Permanent Phone2',
            'photo_file_name' => 'Photo File Name',
            'photo_file_type' => 'Photo File Type',
            'photo_element_data' => 'Photo Element Data',
            'file' => 'Photo',
            'description' => 'Description',
            'isactive' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
<<<<<<< HEAD
=======
     * Finds user by signup request token
     *
     * @param string $token signup request token
     * @return static|null
     */
    public static function findBySignupRequestToken($token)
    {
        return static::findOne([
            'signup_request_token' => $token,
            'isactive' => 'Active',
        ]);
    }

    /**
     * Generates new sign up request token
     */
    public function generateSignupRequestToken()
    {
        $this->signup_request_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes signup request token
     */
    public function removeSignupRequestToken()
    {
        $this->signup_request_token = null;
    }

    /**
>>>>>>> 788e0342064bf5cfa637ba88c6aafea21910adf1
     * @return array
     * - Returns an array of employees in [id => first_name + last_name] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificEmployees($filter = [])
    {
        $employees = null;

        $multiArray =  Employees::find()
            ->asArray()
            ->select(['id', 'employee_id', 'first_name', 'last_name'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray)
            $employees[$singleArray['id']] = $singleArray['employee_id'] .' '. $singleArray['first_name'] .' '. $singleArray['last_name'];

        return $employees;
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
        $employees = self::getSpecificStudents($filter);
        return count($employees);
    }


    /**
     * @return array
     * available gender types
     */
    public function getGenderOptions()
    {
        return ['Male' => 'Male', 'Female' => 'Female'];
    }

    /**
     * @return array
     * available marital options
     */
    public function getMaritalOptions()
    {
        return ['Single' => 'Single', 'Married' => 'Married'];
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


