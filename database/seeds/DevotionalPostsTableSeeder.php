<?php

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;
use Laracasts\TestDummy\Factory as TestDummy;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class DevotionalPostsTableSeeder extends Seeder {


    public function run()
    {
    	
        \DB::table('devotional_posts')->delete();
    	\DB::table('tags')->delete();
        \DB::table('images')->delete();
        \DB::table('devotional_post_tag')->delete();

    	$faker = Faker::create();
        $tag_ids = [];
        // TestDummy::times(30)->create('App\DevotionalPost');

    	for($i=0; $i<20; $i++) {
    		$tag_id = \DB::table('tags')->insertGetId([
    			'name' => $faker->unique()->word,
				'description' => $faker->sentence
            ]);

            $tag_ids[] = $tag_id;
        }

        $min = $tag_ids['0'];
        $max = $tag_ids['19'];
        
        for($i=0; $i<30; $i++) {
            $image_id = \DB::table('images')->insertGetId([
                'name' => $faker->word,
                'path_to_file' => $faker->imageUrl(200, 200, 'nature')
            ]);

            $title = $faker->unique()->sentence;
            $slug = Str::slug($title);

            $devotionalPost_id = \DB::table('devotional_posts')->insertGetId([
                'title' => $title,
                'author' => $faker->name,
                'content' => '<p>'.implode('</p><p>', $faker->paragraphs(5)).'</p>',
                'slug' => $slug,
                'image_id' => $image_id,

                'created_at' => $faker->date

            ]);

            $tags_id = [];
            for($j=0; $j<5; $j++) {
                $tags_id[] = $faker->numberBetween($min, $max);
            }

            $devotionalPost = App\DevotionalPost::find($devotionalPost_id);

            foreach ($tags_id as $tag_id) {

                $devotionalPost->tags()->attach($tag_id);

            }


        }

    }

}