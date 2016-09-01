<?php

use yii\db\Schema;
use yii\db\Migration;

class m141225_100932_modify_user_table extends Migration
{
    public function up()
    {
        $this->alterColumn('user', 'updated_at', Schema::TYPE_STRING);
        $this->alterColumn('user', 'created_at', Schema::TYPE_STRING);

        $this->addColumn('user', 'sid', Schema::TYPE_STRING);
        $this->addColumn('user', 'user_type', Schema::TYPE_STRING);
        $this->addColumn('user', 'work_email', Schema::TYPE_STRING);
        $this->addColumn('user', 'photo_file_name', Schema::TYPE_STRING);
        $this->addColumn('user', 'photo_file_type', Schema::TYPE_STRING);
        $this->addColumn('user', 'photo_file_size', Schema::TYPE_INTEGER);
        $this->addColumn('user', 'photo_element_data', 'MEDIUMBLOB');
        $this->addColumn('user', 'created_by', Schema::TYPE_INTEGER);
        $this->addColumn('user', 'updated_by', Schema::TYPE_INTEGER);

    }

    public function down()
    {
        $this->dropColumn('user', 'sid');
        $this->dropColumn('user', 'user_type');
        $this->dropColumn('user', 'work_email');
        $this->dropColumn('user', 'photo_file_name');
        $this->dropColumn('user', 'photo_file_type');
        $this->dropColumn('user', 'photo_file_size');
        $this->dropColumn('user', 'photo_element_data');
        $this->dropColumn('user', 'created_by');
        $this->dropColumn('user', 'updated_by');

        $this->alterColumn('user', 'updated_at', Schema::TYPE_INTEGER);
        $this->alterColumn('user', 'created_at', Schema::TYPE_INTEGER);
    }
}
