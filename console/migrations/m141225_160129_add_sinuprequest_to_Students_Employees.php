<?php

use yii\db\Schema;
use yii\db\Migration;

class m141225_160129_add_sinuprequest_to_Students_Employees extends Migration
{
    public function up()
    {
        $this->addColumn('students', 'signup_request_token', Schema::TYPE_STRING);
        $this->addColumn('employees', 'signup_request_token', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('employees', 'signup_request_token');
        $this->dropColumn('students', 'signup_request_token');
    }
}
