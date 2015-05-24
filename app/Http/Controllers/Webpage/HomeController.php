<?php namespace App\Http\Controllers\Webpage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Helpers\FacebookGraphApiRequest;
use App\Helpers\FacebookPostHandler;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('webpage.home');
	}
}
