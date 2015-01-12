<?php

namespace common\models;

use Yii;
use yii\base\ErrorException;
use yii\web\UploadedFile;

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
 * @property integer $photo_file_size
 * @property string $signup_request_token
 * @property resource $file
 *
 * @property User $updatedBy
 * @property User $createdBy
 */
class Students extends GeneralRecord
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

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
            [['student_category', 'nationality_id', 'country_id', 'photo_file_size', 'created_by', 'updated_by'], 'integer'],
            [['photo_element_data', 'description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['admission_id', 'first_name', 'last_name', 'date_of_birth', 'student_category', 'nationality_id', 'address_line1', 'city', 'phone1', 'gender'], 'required'],
            [['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png', 'maxSize' => 4000000],
            [['admission_id', 'roll_number', 'admission_date', 'first_name', 'middle_name', 'last_name', 'father_name', 'mother_name', 'date_of_birth', 'gender', 'marital_status', 'blood_group', 'birth_place', 'language', 'religion', 'address_line1', 'address_line2', 'city', 'state', 'phone1', 'phone2', 'email', 'issms_enabled', 'photo_file_name', 'photo_file_type', 'isactive'], 'string', 'max' => 255],
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
            'date_of_birth' => 'Date of Birth',
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
            'file' => 'Photo',
            'description' => 'Description',
            'isactive' => 'Status',
            'created_at' => 'Created At',
            'createdBy.username' => 'Created By',
            'updated_at' => 'Updated At',
            'updatedBy.username' => 'Updated By',
        ];
    }

    /**
     * Finds user by signup request token
     *
     * @param string $token signup request token
     * @return null|static
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
     * @return array
     * - Returns an array of students in [id => first_name + last_name] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificStudents($filter = [])
    {
        $students = null;

        $multiArray =  Students::find()
            ->asArray()
            ->select(['id', 'admission_id', 'first_name', 'last_name'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray)
            $students[$singleArray['id']] = $singleArray['admission_id'] .' '. $singleArray['first_name'] .' '. $singleArray['last_name'];

        return $students;
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
        $students = self::getSpecificStudents($filter);
        return count($students);
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
