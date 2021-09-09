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
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('address_street');
            $table->string('address_suite');
            $table->string('address_city');
            $table->string('address_zipcode');
            $table->decimal('address_geo_lat', 10, 7);
            $table->decimal('address_geo_lng', 10, 7);
            $table->string('phone');
            $table->string('website');
            $table->string('company_name');
            $table->string('company_catch_phrase');
            $table->string('company_bs');
            $table->timestamp('updated_at');
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
