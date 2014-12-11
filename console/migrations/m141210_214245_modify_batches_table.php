<?php

use yii\db\Schema;
use yii\db\Migration;

class m141210_214245_modify_batches_table extends Migration
{
    public function up()
    {
        $this->alterColumn('batches', 'start_date', Schema::TYPE_STRING);
        $this->alterColumn('batches', 'end_date', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->alterColumn('batches', 'start_date', Schema::TYPE_DATE);
        $this->alterColumn('batches', 'end_date', Schema::TYPE_DATE);
    }
}
