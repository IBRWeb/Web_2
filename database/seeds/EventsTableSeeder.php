<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory as TestDummy;

class EventsTableSeeder extends Seeder {

    public function run()
    {
    	\DB::table('events')->delete();

        TestDummy::times(10)->create('App\Event');
    }

}