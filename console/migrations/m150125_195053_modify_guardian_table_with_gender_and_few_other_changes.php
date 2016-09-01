<?php

use yii\db\Schema;
use yii\db\Migration;

class m150125_195053_modify_guardian_table_with_gender_and_few_other_changes extends Migration
{
    public function up()
    {
        $this->renameColumn('guardians', 'Residence_address_line1', 'residence_address_line1');
        $this->renameColumn('guardians', 'Residence_address_line2', 'residence_address_line2');
        $this->renameColumn('guardians', 'Residence_city', 'residence_city');
        $this->renameColumn('guardians', 'Residence_state', 'residence_state');
        $this->renameColumn('guardians', 'Residence_country_id', 'residence_country_id');

        $this->addColumn('guardians', 'gender', Schema::TYPE_STRING);

    }

    public function down()
    {
        $this->renameColumn('guardians', 'residence_address_line1', 'Residence_address_line1');
        $this->renameColumn('guardians', 'residence_address_line2', 'Residence_address_line2');
        $this->renameColumn('guardians', 'residence_city', 'Residence_city');
        $this->renameColumn('guardians', 'residence_state', 'Residence_state');
        $this->renameColumn('guardians', 'residence_country_id', 'Residence_country_id');

        $this->dropColumn('guardians', 'gender');
    }
}
