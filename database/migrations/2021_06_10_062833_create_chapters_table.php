<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->index();
            $table->string('hull_number')->default('');
            $table->boolean('is_joinable')->default(true);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('branch_id')->nullable()->index();
            $table->unsignedBigInteger('chapter_id')->nullable()->index();
            $table->unsignedBigInteger('ship_class_id')->nullable()->index();
            $table->unsignedBigInteger('chapter_type_id')->index();
            $table->date('commission_date')->nullable();
            $table->date('decommission_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
