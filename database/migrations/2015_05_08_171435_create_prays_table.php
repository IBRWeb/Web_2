<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prays', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('petitioner_name');
			$table->string('petitioner_phone')->nullable();
			$table->string('petitioner_email');
			$table->mediumText('petition');
			$table->boolean('visit');
			$table->string('address')->nullable();

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
		Schema::drop('prays');
	}

}
