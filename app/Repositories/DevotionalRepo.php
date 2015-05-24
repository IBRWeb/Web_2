<?php namespace App\Repositories;

use App\DevotionalPost;


class DevotionalRepo {

    public function __construct(DevotionalPost $devotionalPost)
    {
        $this->devotionalPost = $devotionalPost;
    }

	public function getDevotionalPosts($title, $take = 10) {

		 return $this->devotionalPost->title($title)->with('tags', 'image')->paginate($take);

		
	}

	public function getPost($id){

		 return $this->devotionalPost->findOrFail($id);
	}

	public function getTagPosts($tag) {

		return $this->devotionalPost->whereHas('tags', function($query) use ($tag)
			{
				$query->where('name', $tag);
			})->with('tags', 'image')->paginate(5);
		
	}

	public function lookForPost($title)
	{
		return $this->devotionalPost->title($title)->paginate(10);
	}

}