<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Flight__information', function (Blueprint $table) {


            $table->increments('id');
            $table->text('flight_type');
            $table->text('schedule_date');
            $table->text('carrier');
            $table->text('flight_no');
            $table->text('aircraft_type');
            $table->text('reg');
            $table->text('gate');
            $table->text('pos');
            $table->text('belt');
            $table->text('remark');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight__information');
    }
}
