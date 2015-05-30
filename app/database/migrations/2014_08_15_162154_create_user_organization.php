<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserOrganization extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('users_organization')) {
            Schema::create('users_organizations', function(Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('name');
                $table->bigInteger('account_id');
                $table->longText('access_key');
                $table->longText('secret');
                $table->string('address_1');
                $table->string('address_2')->nullable();
                $table->string('city');
                $table->string('postal_code');
                $table->string('state_province');
                $table->string('country');
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();
                $table->string('work')->nullable();
                //Any data that can be serialized.
                $table->binary('data')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users_organizations');
    }

}
