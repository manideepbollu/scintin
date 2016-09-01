<?php

use yii\db\Schema;
use yii\db\Migration;

class m150124_205752_modify_busstops_distance_to_float extends Migration
{
    public function up()
    {
        $this->alterColumn('busstops', 'distance', Schema::TYPE_FLOAT);
    }

    public function down()
    {
        $this->alterColumn('busstops', 'distance', Schema::TYPE_INTEGER);
    }
}
