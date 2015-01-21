<?php

use yii\db\Schema;
use yii\db\Migration;

class m150120_025751_create_categories_countries_employeepostions_departments_employeegrades_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('categories', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'prefix' => Schema::TYPE_STRING,
            'type' => Schema::TYPE_STRING,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createTable('countries', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'notes' => Schema::TYPE_TEXT,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createTable('employee_positions', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'employee_category' => Schema::TYPE_INTEGER,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createTable('departments', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'code' => Schema::TYPE_STRING,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createTable('employee_grades', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'priority' => Schema::TYPE_STRING,

            'daily_hours_max' => Schema::TYPE_INTEGER,
            'weekly_hours_max' => Schema::TYPE_INTEGER,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('categories_create_user_id', 'categories', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('categories_update_user_id', 'categories', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('countries_create_user_id', 'countries', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('countries_update_user_id', 'countries', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('employee_positions_employee_category', 'employee_positions', 'employee_category', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('employee_positions_create_user_id', 'employee_positions', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('employee_positions_update_user_id', 'employee_positions', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('departments_create_user_id', 'departments', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('departments_update_user_id', 'departments', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('employee_grades_create_user_id', 'employee_grades', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('employee_grades_update_user_id', 'employee_grades', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');


    }

    public function down()
    {
        $this->dropForeignKey('categories_create_user_id', 'categories');
        $this->dropForeignKey('categories_update_user_id', 'categories');

        $this->dropForeignKey('countries_create_user_id', 'countries');
        $this->dropForeignKey('countries_update_user_id', 'countries');

        $this->dropForeignKey('employee_positions_employee_category', 'employee_positions');
        $this->dropForeignKey('employee_positions_create_user_id', 'employee_positions');
        $this->dropForeignKey('employee_positions_update_user_id', 'employee_positions');

        $this->dropForeignKey('departments_create_user_id', 'departments');
        $this->dropForeignKey('departments_update_user_id', 'departments');

        $this->dropForeignKey('employee_grades_create_user_id', 'employee_grades');
        $this->dropForeignKey('employee_grades_update_user_id', 'employee_grades');

        $this->dropTable('categories');
        $this->dropTable('countries');
        $this->dropTable('employee_positions');
        $this->dropTable('departments');
        $this->dropTable('employee_grades');
    }
}
