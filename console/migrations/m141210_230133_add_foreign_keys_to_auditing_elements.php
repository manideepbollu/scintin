<?php

use yii\db\Schema;
use yii\db\Migration;

class m141210_230133_add_foreign_keys_to_auditing_elements extends Migration
{
    public function up()
    {
        $this->addForeignKey('course_create_user_id', 'courses', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('course_update_user_id', 'courses', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('batch_create_user_id', 'batches', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('batch_update_user_id', 'batches', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('batch_head_teacher_id', 'batches', 'head_teacher', 'user', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('batch_create_user_id','batches');
        $this->dropForeignKey('batch_update_user_id','batches');
        $this->dropForeignKey('batch_head_teacher_id','batches');

        $this->dropForeignKey('course_create_user_id','batches');
        $this->dropForeignKey('course_update_user_id','batches');
    }
}
