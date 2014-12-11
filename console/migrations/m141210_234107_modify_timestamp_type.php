<?php

use yii\db\Schema;
use yii\db\Migration;

class m141210_234107_modify_timestamp_type extends Migration
{
    public function up()
    {
        $this->alterColumn('batches', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('batches', 'updated_at', Schema::TYPE_STRING);

        $this->alterColumn('courses', 'created_at', Schema::TYPE_STRING);
        $this->alterColumn('courses', 'updated_at', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->alterColumn('batches', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('batches', 'updated_at', Schema::TYPE_DATETIME);

        $this->alterColumn('courses', 'created_at', Schema::TYPE_DATETIME);
        $this->alterColumn('courses', 'updated_at', Schema::TYPE_DATETIME);
    }
}
