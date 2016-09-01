<?php

use yii\db\Schema;
use yii\db\Migration;

class m150128_185358_create_driver_additional_details extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('driver_additional_details', [
            'id' => Schema::TYPE_PK,
            'employee_id' => Schema::TYPE_INTEGER,
            'licence_number' => Schema::TYPE_STRING,
            'licence_issue_date' => Schema::TYPE_STRING,
            'licence_renewal_date' => Schema::TYPE_STRING,

            'insurance_number' => Schema::TYPE_STRING,
            'insurance_issue_date' => Schema::TYPE_STRING,
            'insurance_renewal_date' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);


        $this->addForeignKey('driver_additional_details_employee_id', 'driver_additional_details', 'employee_id', 'employees', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('driver_additional_details_create_user_id', 'driver_additional_details', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('driver_additional_details_update_user_id', 'driver_additional_details', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');


    }

    public function down()
    {
        $this->dropForeignKey('driver_additional_details_employee_id', 'driver_additional_details');
        $this->dropForeignKey('driver_additional_details_create_user_id', 'driver_additional_details');
        $this->dropForeignKey('driver_additional_details_update_user_id', 'driver_additional_details');

        $this->dropTable('driver_additional_details');
    }
}
