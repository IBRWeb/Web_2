<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table -> increments('id');
			
			$table -> string('title');
			$table -> string('description', 50);
			$table -> date('event_time');
			$table -> integer('image_id')->unsigned();
			
			$table -> foreign('image_id')->references('id')->on('images');
			
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
