<?php

use yii\db\Schema;
use yii\db\Migration;

class m150129_161306_add_PK_to_routestops extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

	$this->dropTable('routestops');

        $this->createTable('routestops', [

            'id' => Schema::TYPE_PK,
            'route_id' => Schema::TYPE_INTEGER,
            'stop_id' => Schema::TYPE_INTEGER,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->addForeignKey('routestop_route_id', 'routestops', 'route_id', 'routes', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('routestop_stop_id', 'routestops', 'stop_id', 'busstops', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('routestop_create_user_id', 'routestops', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('routestop_update_user_id', 'routestops', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropTable('routestops');
    }
}
