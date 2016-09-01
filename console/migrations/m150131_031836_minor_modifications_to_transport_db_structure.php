<?php

use yii\db\Schema;
use yii\db\Migration;

class m150131_031836_minor_modifications_to_transport_db_structure extends Migration
{
    public function up()
    {
        $this->addColumn('busstops', 'stop_code', Schema::TYPE_STRING);
        $this->addColumn('routes', 'autoplot', Schema::TYPE_BOOLEAN);
    }

    public function down()
    {
        $this->dropColumn('busstops', 'stop_code');
        $this->dropColumn('routes', 'autoplot');
    }
}
