<?php namespace App\Http\Controllers\Gallery;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\View\Factory as View;

use Illuminate\Http\Request;

class GalleryController extends Controller {

    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function showAlbums()
    {
        return \View::make('gallery.albums');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($albumId)
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($albumId)
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($albumId)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($albumId, $photoId)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($albumId, $photoId)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($albumId, $photoId)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($albumId, $photoId)
	{
		//
	}

}
