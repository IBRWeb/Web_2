<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Helpers\FacebookGraphApiRequest;
use App\Http\Helpers\FacebookPostHandler;

class HomeController extends Controller {

	protected $facebookGraphApiRequest;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$facebookGraphApiRequest = new FacebookGraphApiRequest;
		$facebookGraphApiRequest -> request('GET', '/215181911937130/posts?fields=id,type&limit=15');
		$responseDataArray = $facebookGraphApiRequest -> getResponseDataArray();
		
		$posts_id = FacebookPostHandler::getPostsId($responseDataArray);
		$data     = ['posts_id' => $posts_id];
		
		return view('webpage.home', $data);
	}
}
