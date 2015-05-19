<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrayerRequest;
use Illuminate\Http\Request;
use App\Pray;


class PrayerController extends Controller {

	protected $form;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('webpage.oracion');
    }

    /**
    * Store the new resource in database
    *
    */
    public function store(Request $request) {

    	$input = $request->all();
    	extract($input);
        return view('emails.prayer', $input);

//        \Mail::send('emails.prayer', $input, function($message) use ($email) {
//            $message->from('contacto@ibresurreccion.org.mx', 'Contacto Iglesia Bautista Resurrección');
//            $message->to($email)->subject('Petición de Oración');
//
//        });

		




    }
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
}
