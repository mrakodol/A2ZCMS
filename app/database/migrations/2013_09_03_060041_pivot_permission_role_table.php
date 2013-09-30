<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotPermissionRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_role', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('permission_id')->unsigned()->index();
			$table->integer('role_id')->unsigned()->index();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
		Schema::drop('permission_role');
	}

}
