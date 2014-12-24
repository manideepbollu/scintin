<?php

use yii\db\Schema;
use yii\db\Migration;

class m141223_063920_BLOB_to_MEDIUMBLOB extends Migration
{
    public function up()
    {
        $this->alterColumn('students', 'photo_element_data', 'MEDIUMBLOB');
        $this->alterColumn('employees', 'photo_element_data', 'MEDIUMBLOB');
        $this->addColumn('students', 'photo_file_size', 'INT');
        $this->addColumn('employees', 'photo_file_size', 'INT');

    }

    public function down()
    {
        $this->dropColumn('employees', 'photo_file_size');
        $this->dropColumn('students', 'photo_file_size');
        $this->alterColumn('employees', 'photo_element_data', 'BLOB');
        $this->alterColumn('students', 'photo_element_data', 'BLOB');
    }
}
