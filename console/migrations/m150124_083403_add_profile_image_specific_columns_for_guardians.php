<?php

use yii\db\Schema;
use yii\db\Migration;

class m150124_083403_add_profile_image_specific_columns_for_guardians extends Migration
{
    public function up()
    {
        $this->addColumn('guardians', 'photo_file_name', Schema::TYPE_STRING);
        $this->addColumn('guardians', 'photo_file_type', Schema::TYPE_STRING);
        $this->addColumn('guardians', 'photo_file_size', 'INT');
        $this->addColumn('guardians', 'photo_element_data', 'MEDIUMBLOB');

        $this->alterColumn('guardians', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('guardians', 'updated_at', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('guardians', 'photo_file_name');
        $this->dropColumn('guardians', 'photo_file_type');
        $this->dropColumn('guardians', 'photo_file_size');
        $this->dropColumn('guardians', 'photo_element_data');

        $this->alterColumn('guardians', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('guardians', 'updated_at', Schema::TYPE_DATETIME);
    }
}
