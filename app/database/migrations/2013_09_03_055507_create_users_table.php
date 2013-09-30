<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('surname');
			$table->string('email')->unique();
			$table->boolean('picture')->default(0);
			$table->string('username')->unique();
			$table->string('password');
			$table->boolean('active')->default(0);
			$table->boolean('confirmed')->default(0);
			$table->string('confirmation_code');
			$table->timestamps();
			$table->softDeletes();	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
