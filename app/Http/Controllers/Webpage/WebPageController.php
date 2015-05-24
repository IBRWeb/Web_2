<?php namespace App\Http\Controllers\Webpage;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\ResolveView;

use Illuminate\Http\Request;

class WebPageController extends Controller {

    protected $view;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($view)
	{
		// dd("test");
		$view = new ResolveView($view);
        $viewPath = $view -> getViewPath();

        return view($viewPath);
	}
}
