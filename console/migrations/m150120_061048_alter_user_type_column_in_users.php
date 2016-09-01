<?php

use yii\db\Schema;
use yii\db\Migration;

class m150120_061048_alter_user_type_column_in_users extends Migration
{
    public function up()
    {
        $this->renameColumn('user', 'user_type', 'user_role');

    }

    public function down()
    {
        $this->renameColumn('user', 'user_role', 'user_type');
    }
}
