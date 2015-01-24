<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "guardians".
 *
 * @property integer $id
 * @property integer $child_admission_id
 * @property string $first_name
 * @property string $last_name
 * @property string $relation
 * @property string $date_of_birth
 * @property string $occupation
 * @property integer $income
 * @property string $education
 * @property string $email
 * @property string $office_phone
 * @property string $residence_phone
 * @property string $mobile_phone
 * @property string $fax
 * @property string $office_address_line1
 * @property string $office_address_line2
 * @property string $office_city
 * @property string $office_state
 * @property integer $office_country_id
 * @property string $Residence_address_line1
 * @property string $Residence_address_line2
 * @property string $Residence_city
 * @property string $Residence_state
 * @property integer $Residence_country_id
 * @property string $description
 * @property string $isactive
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $photo_file_name
 * @property string $photo_file_type
 * @property resource $photo_element_data
 * @property integer $photo_file_size
 *
 * @property Countries $residenceCountry
 * @property Students $childAdmission
 * @property User $createdBy
 * @property Countries $officeCountry
 * @property User $updatedBy
 */
class Guardians extends GeneralRecord
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
        return 'guardians';
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($params)
    {
        if ($this->file = UploadedFile::getInstance($this, 'file')) {
            if ($this->validate()) {
                $this->photo_file_name = $this->file->name;
                $this->photo_file_type = $this->file->type;
                $this->photo_file_size = $this->file->size;
                $this->photo_element_data = file_get_contents($this->file->tempName);
            } else {
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
            [['child_admission_id', 'income', 'office_country_id', 'Residence_country_id', 'created_by', 'updated_by', 'photo_file_size'], 'integer'],
            [['description', 'photo_element_data'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'],'email'],
            [['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',  'maxSize' => 4000000],
            [['first_name', 'last_name', 'relation', 'date_of_birth', 'occupation', 'education', 'email', 'office_phone', 'residence_phone', 'mobile_phone', 'fax', 'office_address_line1', 'office_address_line2', 'office_city', 'office_state', 'Residence_address_line1', 'Residence_address_line2', 'Residence_city', 'Residence_state', 'photo_file_name', 'photo_file_type', 'isactive'], 'string', 'max' => 255],
            [['child_admission_id','first_name', 'relation', 'Residence_address_line1', 'Residence_city', 'Residence_state', 'Residence_country_id', 'mobile_phone' ], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'child_admission_id' => 'Child Admission ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'relation' => 'Relation',
            'date_of_birth' => 'Date Of Birth',
            'occupation' => 'Occupation',
            'income' => 'Income',
            'education' => 'Education',
            'email' => 'Email',
            'office_phone' => 'Office Phone',
            'residence_phone' => 'Residence Phone',
            'mobile_phone' => 'Mobile Phone',
            'fax' => 'Fax',
            'office_address_line1' => 'Office Address Line1',
            'office_address_line2' => 'Office Address Line2',
            'office_city' => 'Office City',
            'office_state' => 'Office State',
            'office_country_id' => 'Office Country',
            'Residence_address_line1' => 'Residence Address Line1',
            'Residence_address_line2' => 'Residence Address Line2',
            'Residence_city' => 'Residence City',
            'Residence_state' => 'Residence State',
            'Residence_country_id' => 'Residence Country',
            'file' => 'Photo',
            'description' => 'Description',
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
     * @return array
     * - Returns an array of guardians in [id =>  first_name + last_name] pair.
     * Results can be filtered by passing params in Array format.
     * @param array $filter
     * - This can be an array of columns with their desired values
     * to filter while fetching the table for data
     */
    public static function getSpecificGuardians($filter = [])
    {
        $guardians = null;

        $multiArray =  Guardians::find()
            ->asArray()
            ->select(['id', 'child_admission_id', 'first_name', 'last_name'])
            ->where($filter)
            ->all();

        foreach($multiArray as $singleArray)
            $guardians[$singleArray['id']] = $singleArray['child_admission_id'] .' '. $singleArray['first_name'] .' '. $singleArray['last_name'];

        return $guardians;
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
        $guardians = self::getSpecificGuardians($filter);
        return count($guardians);
    }

    /**
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
     * @return \yii\db\ActiveQuery
     */
    public function getResidenceCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'Residence_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildAdmission()
    {
        return $this->hasOne(Students::className(), ['id' => 'child_admission_id']);
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
    public function getOfficeCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'office_country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
