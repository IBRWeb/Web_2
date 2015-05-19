<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevotionalPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('devotional_posts', function(Blueprint $table)
		{
			$table -> increments('id');

			$table -> string('title')->unique();
			$table -> string('author');
			$table -> text('content');
			$table -> string('slug');
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
		Schema::drop('devotional_posts');
		
	}

}
