<?php

use yii\db\Schema;
use yii\db\Migration;

class m141208_141505_modify_course_batch_columns extends Migration
{
    public function up()
    {
        $this->alterColumn('courses', 'isactive', Schema::TYPE_STRING);
        $this->alterColumn('courses', 'elective_enabled', Schema::TYPE_STRING);
        $this->alterColumn('courses', 'grading_system', Schema::TYPE_STRING);

    }

    public function down()
    {
        $this->alterColumn('courses', 'isactive', Schema::TYPE_BOOLEAN);
        $this->alterColumn('courses', 'elective_enabled', Schema::TYPE_BOOLEAN);
        $this->alterColumn('courses', 'elective_enabled', Schema::TYPE_BOOLEAN);
    }
}
