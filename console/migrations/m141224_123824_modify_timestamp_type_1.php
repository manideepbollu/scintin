<?php

use yii\db\Schema;
use yii\db\Migration;

class m141224_123824_modify_timestamp_type_1 extends Migration
{
    public function up()
    {
        $this->alterColumn('subjects', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('subjects', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('elective_groups', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('elective_groups', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('students', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('students', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('employees', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('employees', 'updated_at', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->alterColumn('subjects', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('subjects', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('elective_groups', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('elective_groups', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('students', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('students', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('employees', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('employees', 'updated_at', Schema::TYPE_DATETIME);
    }
}
