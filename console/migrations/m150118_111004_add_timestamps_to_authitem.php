<?php

use yii\db\Schema;
use yii\db\Migration;

class m150118_111004_add_timestamps_to_authitem extends Migration
{
    public function up()
    {
        $this->alterColumn('auth_item', 'updated_at', Schema::TYPE_STRING);
        $this->alterColumn('auth_item', 'created_at', Schema::TYPE_STRING);

        $this->addColumn('auth_item', 'created_by', Schema::TYPE_INTEGER);
        $this->addColumn('auth_item', 'updated_by', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('auth_item', 'created_by');
        $this->dropColumn('auth_item', 'updated_by');

        $this->alterColumn('auth_item', 'updated_at', Schema::TYPE_INTEGER);
        $this->alterColumn('auth_item', 'created_at', Schema::TYPE_INTEGER);
    }
}
