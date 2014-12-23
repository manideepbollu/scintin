<?php

namespace common\models;

use Yii;

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
 */
class Employees extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['employee_category', 'employee_position_id', 'employee_department_id', 'reporting_manager_id', 'employee_grade_id', 'experience_years', 'experience_months', 'children_count', 'nationality_id', 'present_country_id', 'permanent_country_id', 'created_by', 'updated_by'], 'integer'],
            [['experience_details', 'photo_element_data', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['employee_id', 'joining_date', 'first_name', 'middle_name', 'last_name', 'job_title', 'qualification', 'father_name', 'mother_name', 'spouse_name', 'date_of_birth', 'gender', 'marital_status', 'blood_group', 'birth_place', 'language', 'religion', 'present_address_line1', 'present_address_line2', 'present_city', 'present_state', 'present_phone1', 'present_phone2', 'present_mobile', 'email', 'fax', 'permanent_address_line1', 'permanent_address_line2', 'permanent_city', 'permanent_state', 'permanent_phone1', 'permanent_phone2', 'photo_file_name', 'photo_file_type', 'isactive'], 'string', 'max' => 255]
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
            'description' => 'Description',
            'isactive' => 'Isactive',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
