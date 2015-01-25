<?php

use yii\db\Schema;
use yii\db\Migration;

class m150125_190246_modify_misc_tables_column_attribute_types extends Migration
{
    public function up()
    {
        $this->alterColumn('categories', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('categories', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('countries', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('countries', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('employee_positions', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('employee_positions', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('departments', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('departments', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('employee_grades', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('employee_grades', 'updated_at', Schema::TYPE_STRING);


    }

    public function down()
    {
        $this->alterColumn('categories', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('categories', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('countries', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('countries', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('employee_positions', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('employee_positions', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('departments', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('departments', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('employee_grades', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('employee_grades', 'updated_at', Schema::TYPE_DATETIME);

    }
}
