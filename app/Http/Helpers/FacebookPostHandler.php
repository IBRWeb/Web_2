<?php namespace App\Http\Helpers;

/**
* 
*/
class FacebookPostHandler {
	
	private $ids = array();

	static function getPostsId($posts_data){
		foreach ($posts_data as $post) {
			$type = $post -> type;
			if($type == 'status'){
				$id = $post -> id;
				$id_parts = explode("_", $id);
				$posts_id[] = $id_parts;
			}
		}

	return $posts_id;
	}	
}

