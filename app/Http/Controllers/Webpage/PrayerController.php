<?php namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrayerRequest;
use App\Helpers\MailSender;
use App\Pray;


class PrayerController extends Controller {

    public function __construct(Pray $pray, MailSender $mailSender)
    {
        $this->pray = $pray;
        $this->mailSender = $mailSender;
    }
   	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return redirect(route('oracion.create'));
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
    public function store(PrayerRequest $request)
    {
        $data = $request->getData();
        $pray = $this->pray->create($data);
        $this->mailSender->prayerMail($pray);
        return redirect(route('oracion.create'));
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
