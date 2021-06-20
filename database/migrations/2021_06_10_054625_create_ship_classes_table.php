<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_classes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->index();
            $table->string('image_url')->default('');
            $table->unsignedBigInteger('ship_type_id')->index();
            $table->unsignedSmallInteger('crew_max')->default(0);
            $table->unsignedSmallInteger('crew_min')->default(0);
            $table->unsignedSmallInteger('officer_min')->default(0);
            $table->unsignedSmallInteger('type_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ship_classes');
    }
}
