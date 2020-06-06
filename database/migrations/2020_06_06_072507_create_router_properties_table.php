<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRouterPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('router_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('sapid', 18);
            $table->string('host_name', 14);
            $table->string('loop_back', 100);
            $table->string('mac_address', 17)->unique();
            $table->softDeletes('deleted_at', 0);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('router_properties');
    }
}
