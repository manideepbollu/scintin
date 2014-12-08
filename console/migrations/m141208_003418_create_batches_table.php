<?php

use yii\db\Schema;
use yii\db\Migration;

class m141208_003418_create_batches_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('batches', [
            'id' => Schema::TYPE_PK,
            'batch_name' => Schema::TYPE_STRING . ' NOT NULL',
            'course_id' => Schema::TYPE_INTEGER,
            'head_teacher' => Schema::TYPE_INTEGER,

            'start_date' => Schema::TYPE_DATE,
            'end_date' => Schema::TYPE_DATE,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('batch_course_id', 'batches', 'course_id', 'courses', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('batch_course_id', 'batches');
        $this->dropTable('batches');
    }
}
