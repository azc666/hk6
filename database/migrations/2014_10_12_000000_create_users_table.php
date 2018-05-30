<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('loc_name');
            $table->string('loc_num');
            $table->integer('admin')->unsigned();
            $table->string('loc_address1');
            $table->string('loc_address2');
            $table->string('loc_city');
            $table->string('loc_state');
            $table->string('loc_zip');
            $table->string('contact_a');
            $table->string('email');
            $table->string('phone_a');
            $table->string('fax_a');
            $table->string('cell_a');
            $table->string('contact_b');
            $table->string('email_b');
            $table->string('phone_b');
            $table->string('fax_b');
            $table->string('cell_b');
            $table->string('contact_s');
            $table->string('email_s');
            $table->string('phone_s');
            $table->string('fax_s');
            $table->string('cell_s');
            $table->string('address1_s');
            $table->string('address2_s');
            $table->string('city_s');
            $table->string('state_s');
            $table->string('zip_s');
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
