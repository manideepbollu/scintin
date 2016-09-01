<?php

use yii\db\Schema;
use yii\db\Migration;

class m141222_221653_create_students_employees_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('students', [

            'id' => Schema::TYPE_PK,
            'admission_id' => Schema::TYPE_STRING,
            'roll_number' => Schema::TYPE_STRING,
            'admission_date' => Schema::TYPE_STRING,
            'student_category' => Schema::TYPE_INTEGER,

            'first_name' => Schema::TYPE_STRING,
            'middle_name' => Schema::TYPE_STRING,
            'last_name' => Schema::TYPE_STRING,

            'father_name' => Schema::TYPE_STRING,
            'mother_name' => Schema::TYPE_STRING,

            'date_of_birth' => Schema::TYPE_STRING,
            'gender' => Schema::TYPE_STRING,
            'marital_status' => Schema::TYPE_STRING,
            'blood_group' => Schema::TYPE_STRING,
            'birth_place' => Schema::TYPE_STRING,
            'nationality_id' => Schema::TYPE_INTEGER,
            'language' => Schema::TYPE_STRING,
            'religion' => Schema::TYPE_STRING,

            'address_line1' => Schema::TYPE_STRING,
            'address_line2' => Schema::TYPE_STRING,
            'city' => Schema::TYPE_STRING,
            'state' => Schema::TYPE_STRING,
            'country_id' => Schema::TYPE_INTEGER,
            'phone1' => Schema::TYPE_STRING,
            'phone2' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,

            'issms_enabled' => Schema::TYPE_STRING,

            'photo_file_name' => Schema::TYPE_STRING,
            'photo_file_type' => Schema::TYPE_STRING,
            'photo_element_data' => Schema::TYPE_BINARY,

            'description' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->createTable('employees', [

            'id' => Schema::TYPE_PK,
            'employee_id' => Schema::TYPE_STRING,
            'joining_date' => Schema::TYPE_STRING,
            'employee_category' => Schema::TYPE_INTEGER,

            'first_name' => Schema::TYPE_STRING,
            'middle_name' => Schema::TYPE_STRING,
            'last_name' => Schema::TYPE_STRING,

            'job_title' => Schema::TYPE_STRING,
            'employee_position_id' => Schema::TYPE_INTEGER,
            'employee_department_id' => Schema::TYPE_INTEGER,
            'reporting_manager_id' => Schema::TYPE_INTEGER,
            'employee_grade_id' => Schema::TYPE_INTEGER,
            'qualification' => Schema::TYPE_STRING,

            'experience_details' => Schema::TYPE_TEXT,
            'experience_years' => Schema::TYPE_INTEGER,
            'experience_months' => Schema::TYPE_INTEGER,

            'father_name' => Schema::TYPE_STRING,
            'mother_name' => Schema::TYPE_STRING,
            'spouse_name' => Schema::TYPE_STRING,

            'date_of_birth' => Schema::TYPE_STRING,
            'gender' => Schema::TYPE_STRING,
            'marital_status' => Schema::TYPE_STRING,
            'children_count' => Schema::TYPE_INTEGER,
            'blood_group' => Schema::TYPE_STRING,
            'birth_place' => Schema::TYPE_STRING,
            'nationality_id' => Schema::TYPE_INTEGER,
            'language' => Schema::TYPE_STRING,
            'religion' => Schema::TYPE_STRING,

            'present_address_line1' => Schema::TYPE_STRING,
            'present_address_line2' => Schema::TYPE_STRING,
            'present_city' => Schema::TYPE_STRING,
            'present_state' => Schema::TYPE_STRING,
            'present_country_id' => Schema::TYPE_INTEGER,
            'present_phone1' => Schema::TYPE_STRING,
            'present_phone2' => Schema::TYPE_STRING,
            'present_mobile' => Schema::TYPE_STRING,

            'email' => Schema::TYPE_STRING,
            'fax' => Schema::TYPE_STRING,

            'permanent_address_line1' => Schema::TYPE_STRING,
            'permanent_address_line2' => Schema::TYPE_STRING,
            'permanent_city' => Schema::TYPE_STRING,
            'permanent_state' => Schema::TYPE_STRING,
            'permanent_country_id' => Schema::TYPE_INTEGER,
            'permanent_phone1' => Schema::TYPE_STRING,
            'permanent_phone2' => Schema::TYPE_STRING,

            'photo_file_name' => Schema::TYPE_STRING,
            'photo_file_type' => Schema::TYPE_STRING,
            'photo_element_data' => Schema::TYPE_BINARY,

            'description' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('employees');
        $this->dropTable('students');
    }
}
