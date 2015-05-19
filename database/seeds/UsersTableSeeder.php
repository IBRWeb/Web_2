<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	\DB::table('users')->delete();
        

        $faker = Faker::create();


        for($i=0; $i<100; $i++) {
        	\DB::table('users')->insert([
        		'name' => $faker->name,
        		'email' => $faker->unique()->email,
        		'password' => \Hash::make('1234567890')
        	]);
        }
    }

}