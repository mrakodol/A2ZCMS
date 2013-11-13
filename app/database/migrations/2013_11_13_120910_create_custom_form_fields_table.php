<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomFormFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('custom_form_fields', function(Blueprint $table) {
			$table->increments('id');
			$table -> integer('custom_form_id')->unsigned()->index();
			$table -> foreign('custom_form_id')->references('id')->on('custom_forms')->onDelete('cascade');
			$table -> integer('user_id')->unsigned()->index();
			$table -> foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table -> string('name');
			$table -> string('options');	
			$table -> integer('type');	
			$table -> integer('order');	
			$table -> boolean('mandatory');				
			$table -> timestamps();
			$table -> softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ccustom_form_fields');
	}

}
