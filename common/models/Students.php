<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $admission_id
 * @property string $roll_number
 * @property string $admission_date
 * @property integer $student_category
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $father_name
 * @property string $mother_name
 * @property string $date_of_birth
 * @property string $gender
 * @property string $marital_status
 * @property string $blood_group
 * @property string $birth_place
 * @property integer $nationality_id
 * @property string $language
 * @property string $religion
 * @property string $address_line1
 * @property string $address_line2
 * @property string $city
 * @property string $state
 * @property integer $country_id
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property string $issms_enabled
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
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_category', 'nationality_id', 'country_id', 'created_by', 'updated_by'], 'integer'],
            [['photo_element_data', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['admission_id', 'roll_number', 'admission_date', 'first_name', 'middle_name', 'last_name', 'father_name', 'mother_name', 'date_of_birth', 'gender', 'marital_status', 'blood_group', 'birth_place', 'language', 'religion', 'address_line1', 'address_line2', 'city', 'state', 'phone1', 'phone2', 'email', 'issms_enabled', 'photo_file_name', 'photo_file_type', 'isactive'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admission_id' => 'Admission ID',
            'roll_number' => 'Roll Number',
            'admission_date' => 'Admission Date',
            'student_category' => 'Student Category',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'marital_status' => 'Marital Status',
            'blood_group' => 'Blood Group',
            'birth_place' => 'Birth Place',
            'nationality_id' => 'Nationality ID',
            'language' => 'Language',
            'religion' => 'Religion',
            'address_line1' => 'Address Line 1',
            'address_line2' => 'Address Line 2',
            'city' => 'City',
            'state' => 'State',
            'country_id' => 'Country',
            'phone1' => 'Phone 1',
            'phone2' => 'Phone 2',
            'email' => 'Email',
            'issms_enabled' => 'SMS Subscription',
            'photo_file_name' => 'Photo File Name',
            'photo_file_type' => 'Photo File Type',
            'photo_element_data' => 'Photo Element Data',
            'description' => 'Description',
            'isactive' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
