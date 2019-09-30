<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix')->nullable()->default(null);
            $table->string('address_1');
            $table->string('address_2');
            $table->string('city');
            $table->string('state_province');
            $table->string('postal_code');
            $table->string('country', 3);
            $table->string('telephone');
            $table->dateTime('application_date');
            $table->dateTime('registration_date')->nullable();
            $table->enum('membership_status', ['pending', 'active', 'denied', 'suspended']);
            $table->date('dob');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
