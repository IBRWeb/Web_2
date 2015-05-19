<?php namespace App\Repositories;

use Illuminate\Database\Query\Builder;
use App\DevotionalPost;
use App\Tag;


class DevotionalRepo {

	public function getDevotionalPosts($title, $take = 10) {

		 return DevotionalPost::title($title)->with('tags', 'image')->paginate($take);

		
	}

	public function getPost($id){

		 return DevotionalPost::findOrFail($id);


	}

	public function getTagPosts($tag) {

		return DevotionalPost::whereHas('tags', function($query) use ($tag)
			{
				$query->where('name', $tag);
			})->with('tags', 'image')->paginate(5);
		
	}

	public function lookForPost($title)
	{
		return DevotionalPost::title($title)->paginate(10);
	}

}