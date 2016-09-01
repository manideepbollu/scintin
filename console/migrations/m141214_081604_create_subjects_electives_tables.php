<?php

use yii\db\Schema;
use yii\db\Migration;

class m141214_081604_create_subjects_electives_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('subjects',[
            'id' => Schema::TYPE_PK,
            'subject_name' => Schema::TYPE_STRING,
            'subject_code' => Schema::TYPE_STRING,
            'subject_type' => Schema::TYPE_STRING,

            'iselective' => Schema::TYPE_STRING,
            'elective_group' => Schema::TYPE_INTEGER,
            'parent_type' => Schema::TYPE_STRING,
            'course_id' => Schema::TYPE_INTEGER,
            'batch_id' => Schema::TYPE_INTEGER,

            'weekly_classes_max' => Schema::TYPE_INTEGER,
            'language' => Schema::TYPE_INTEGER,
            'credit_hours' => Schema::TYPE_INTEGER,
            'dependant_on' => Schema::TYPE_INTEGER,

            'isactive' => Schema::TYPE_STRING,
            'noexam' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,

        ],$tableOptions);

        $this->createTable('elective_groups',[
            'id' => Schema::TYPE_PK,
            'group_name' => Schema::TYPE_STRING,

            'parent_type' => Schema::TYPE_STRING,
            'course_id' => Schema::TYPE_INTEGER,
            'batch_id' => Schema::TYPE_INTEGER,

            'max_subjects' => Schema::TYPE_INTEGER,
            'min_subjects' => Schema::TYPE_INTEGER,

            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_DATETIME,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,
        ],$tableOptions);

        $this->addForeignKey('subject_elective_id','subjects','elective_group','elective_groups','id','CASCADE','CASCADE');
        $this->addForeignKey('subject_course_id','subjects','course_id','courses','id','CASCADE','CASCADE');
        $this->addForeignKey('subject_batch_id','subjects','batch_id','batches','id','CASCADE','CASCADE');
        $this->addForeignKey('subject_dependant_id','subjects','dependant_on','subjects','id','CASCADE','CASCADE');
        $this->addForeignKey('subject_create_user_id','subjects','created_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('subject_update_user_id','subjects','updated_by','user','id','CASCADE','CASCADE');

        $this->addForeignKey('elective_groups_course_id','elective_groups','course_id','courses','id','CASCADE','CASCADE');
        $this->addForeignKey('elective_groups_batch_id','elective_groups','batch_id','batches','id','CASCADE','CASCADE');
        $this->addForeignKey('elective_groups_create_user_id','elective_groups','created_by','user','id','CASCADE','CASCADE');
        $this->addForeignKey('elective_groups_update_user_id','elective_groups','updated_by','user','id','CASCADE','CASCADE');


    }

    public function down()
    {
        $this->dropTable('subjects');
        $this->dropTable('elective_groups');

        $this->dropTable('subject_elective_id');
        $this->dropTable('subject_course_id');
        $this->dropTable('subject_batch_id');
        $this->dropTable('subject_dependant_id');
        $this->dropTable('subject_create_user_id');
        $this->dropTable('subject_update_user_id');
        $this->dropTable('elective_groups_course_id');
        $this->dropTable('elective_groups_batch_id');
        $this->dropTable('elective_groups_create_user_id');
        $this->dropTable('elective_groups_update_user_id');
        return false;
    }
}
