<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            if (!Schema::hasTable('users_profiles')) {
		Schema::create('users_profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
                        //Sortable Profile Fields.
                        $table->unsignedInteger('user_id');
                        $table->unsignedInteger('organization_id');
                        $table->string('address_1')->nullable();
                        $table->string('address_2')->nullable();
                        $table->string('city')->nullable();
                        $table->string('postal_code')->nullable();
                        $table->string('state_province')->nullable();
                        $table->string('country')->nullable();
                        $table->string('phone')->nullable();
                        $table->string('mobile')->nullable();
                        $table->string('work')->nullable();
                        //Any data that can be serialized.
                        $table->binary('data')->nullable();
                        //Indexes
                        $table->foreign('user_id')->references('id')->on('users');
                        $table->foreign('organization_id')->references('id')->on('users_organizations');
		});
            }
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_profiles');
	}

}
