<?php

use yii\db\Schema;
use yii\db\Migration;

class m150121_174358_transport_department extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('busstops', [

            'id' => Schema::TYPE_PK,
            'stop_name' => Schema::TYPE_STRING,
            'lat_coords' => Schema::TYPE_STRING,
            'lon_coords' => Schema::TYPE_STRING,
            'distance' => Schema::TYPE_INTEGER,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->createTable('routes', [

            'id' => Schema::TYPE_PK,
            'route_code' => Schema::TYPE_STRING,
            'destination_id' => Schema::TYPE_INTEGER,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->createTable('routestops', [

            'route_id' => Schema::TYPE_INTEGER,
            'stop_id' => Schema::TYPE_INTEGER,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->createTable('vehicles', [

            'id' => Schema::TYPE_PK,
            'vehicle_number' => Schema::TYPE_STRING,
            'vehicle_code' => Schema::TYPE_STRING,
            'vehicle_type' => Schema::TYPE_STRING,
            'vehicle_category' => Schema::TYPE_INTEGER,

            'date_of_registration' => Schema::TYPE_STRING,
            'expiry_date' => Schema::TYPE_STRING,
            'insurance_renewal_date' => Schema::TYPE_STRING,

            'assigned_driver' => Schema::TYPE_INTEGER,
            'capacity' => Schema::TYPE_INTEGER,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->createTable('vehicleroutes', [

            'route_id' => Schema::TYPE_INTEGER,
            'vehicle_id' => Schema::TYPE_INTEGER,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->createTable('subscriptions', [

            'id' => Schema::TYPE_PK,
            'user_type' => Schema::TYPE_STRING,
            'user_sid' => Schema::TYPE_STRING,
            'route_id' => Schema::TYPE_INTEGER,
            'stop_id' => Schema::TYPE_INTEGER,
            'vehicle_id' => Schema::TYPE_INTEGER,

            'start_date' => Schema::TYPE_STRING,
            'end_date' => Schema::TYPE_STRING,

            'notes' => Schema::TYPE_TEXT,
            'isactive' => Schema::TYPE_STRING,

            'created_at' => Schema::TYPE_STRING,
            'created_by' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_INTEGER,

        ], $tableOptions);

        $this->addForeignKey('busstop_create_user_id', 'busstops', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('busstop_update_user_id', 'busstops', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('route_destination_id', 'routes', 'destination_id', 'busstops', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('route_create_user_id', 'routes', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('route_update_user_id', 'routes', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('routestop_route_id', 'routestops', 'route_id', 'routes', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('routestop_stop_id', 'routestops', 'stop_id', 'busstops', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('routestop_create_user_id', 'routestops', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('routestop_update_user_id', 'routestops', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('vehicle_driver_id', 'vehicles', 'assigned_driver', 'employees', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('vehicle_create_user_id', 'vehicles', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('vehicle_update_user_id', 'vehicles', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('vehicleroute_route_id', 'vehicleroutes', 'route_id', 'routes', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('vehicleroute_vehicle_id', 'vehicleroutes', 'vehicle_id', 'vehicles', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('vehicleroute_create_user_id', 'vehicleroutes', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('vehicleroute_update_user_id', 'vehicleroutes', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('subscription_route_id', 'subscriptions', 'route_id', 'routes', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('subscription_stop_id', 'subscriptions', 'stop_id', 'busstops', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('subscription_vehicle_id', 'subscriptions', 'vehicle_id', 'vehicles', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('subscription_create_user_id', 'subscriptions', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('subscription_update_user_id', 'subscriptions', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        echo "m150121_174358_transport_department cannot be reverted.\n";

        return false;
    }
}
