<?php

use yii\db\Schema;
use yii\db\Migration;

class m141208_002325_create_courses_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('courses', [
            'id' => Schema::TYPE_PK,
            'course_name' => Schema::TYPE_STRING . ' NOT NULL',
            'section_name' => Schema::TYPE_STRING,
            'course_code' => Schema::TYPE_STRING,

            'isactive' => Schema::TYPE_BOOLEAN,
            'grading_system' => Schema::TYPE_INTEGER,
            'elective_enabled' => Schema::TYPE_BOOLEAN,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('')
    }

    public function down()
    {
        $this->dropTable('courses');
    }
}
