<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Helpers\ResolveView;

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
		$view = new ResolveView($view);
        $viewPath = $view -> getViewPath();

        return view($viewPath);
	}
}
