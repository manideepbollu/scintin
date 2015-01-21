<?php

use yii\db\Schema;
use yii\db\Migration;

class m150120_033400_create_guardians_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('guardians', [
            'id' => Schema::TYPE_PK,
            'child_admission_id' => Schema::TYPE_INTEGER,
            'first_name' => Schema::TYPE_STRING,
            'last_name' => Schema::TYPE_STRING,
            'relation' => Schema::TYPE_STRING,
            'date_of_birth' => Schema::TYPE_STRING,

            'occupation' => Schema::TYPE_STRING,
            'income' => Schema::TYPE_INTEGER,
            'education' => Schema::TYPE_STRING,

            'email' => Schema::TYPE_STRING,
            'office_phone' => Schema::TYPE_STRING,
            'residence_phone' => Schema::TYPE_STRING,
            'mobile_phone' => Schema::TYPE_STRING,
            'fax' => Schema::TYPE_STRING,
            'office_address_line1' => Schema::TYPE_STRING,
            'office_address_line2' => Schema::TYPE_STRING,
            'office_city' => Schema::TYPE_STRING,
            'office_state' => Schema::TYPE_STRING,
            'office_country_id' => Schema::TYPE_INTEGER,
            'Residence_address_line1' => Schema::TYPE_STRING,
            'Residence_address_line2' => Schema::TYPE_STRING,
            'Residence_city' => Schema::TYPE_STRING,
            'Residence_state' => Schema::TYPE_STRING,
            'Residence_country_id' => Schema::TYPE_INTEGER,

            'description' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('guardians_child_admission_id', 'guardians', 'child_admission_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('guardians_office_country_id', 'guardians', 'office_country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('guardians_Residence_country_id', 'guardians', 'Residence_country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('guardians_create_user_id', 'guardians', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('guardians_update_user_id', 'guardians', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('guardians_child_admission_id', 'guardians');
        $this->dropForeignKey('guardians_office_country_id', 'guardians');
        $this->dropForeignKey('guardians_Residence_country_id', 'guardians');
        $this->dropForeignKey('guardians_create_user_id', 'guardians');
        $this->dropForeignKey('guardians_update_user_id', 'guardians');
        $this->dropTable('guardians');
    }
}
