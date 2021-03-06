<?php
use Illuminate\Database\Migrations\Migration;

class EntrustSetupTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		// Creates the roles table
		Schema::create('roles', function($table) {
			$table -> engine = 'InnoDB';
			$table -> increments('id');
			$table -> string('name');
			$table -> timestamps();
			$table -> softDeletes();
		});

		// Creates the assigned_roles (Many-to-Many relation) table
		Schema::create('assigned_roles', function($table) {
			$table -> engine = 'InnoDB';
			$table -> increments('id');
			$table -> integer('user_id') -> unsigned();
			$table -> integer('role_id') -> unsigned();
			$table -> foreign('user_id') -> references('id') -> on('users');
			$table -> foreign('role_id') -> references('id') -> on('roles');
			$table -> timestamps();
			$table -> softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('assigned_roles');
		Schema::drop('roles');
	}

}
