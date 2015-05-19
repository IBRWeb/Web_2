<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\DevotionalRepo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DevotionalController extends Controller {

	public function __construct(DevotionalRepo $devotionalRepo)
	{
		$this -> devotionalRepo = $devotionalRepo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$devotionalPosts = $this->devotionalRepo->getDevotionalPosts($request->get('title'));
        if(count($devotionalPosts) == 1) {
            $post = $devotionalPosts['0'];
            $slug = $post -> slug;
            $id = $post -> id;
            return $this->showPost($slug, $id, $post);
        }else {
            return \View::make('webpage.devocional', compact('devotionalPosts'));
        }
	}

	/**
	*Display a post with the give $id
	*
	*@return Response
	*/

	public function showPost($slug, $id, $post = null)
	{
        if(!$post){
            $post = $this -> devotionalRepo -> getPost($id);
        }

		$relatedPosts = $this ->devotionalRepo ->getDevotionalPosts(null, 5);

		if($post->slug == $slug){
			return \View::make('webpage.devocionalPost', compact('post', 'relatedPosts'));
		}else {
			abort(404);
		}


	}

	public function tagPosts($tag)
	{

		$devotionalPosts = $this -> devotionalRepo -> getTagPosts($tag);

		if(count($devotionalPosts) !== 0){
			// dd($tag['0']->devotionalPosts);
			return \View::make('webpage.devocional', compact('devotionalPosts'));
			
		}else {
			abort(404);
		}

	}

    public function lookForPostBySlug(Request $request, $slug)
    {
        $data = ['title' => str_replace('-', ' ', $slug)];
        $request->merge($data);
        return $this->index($request);
    }


}
