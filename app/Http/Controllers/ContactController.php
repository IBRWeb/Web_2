<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Helpers\MailSender;

use Illuminate\Http\Request;

class ContactController extends Controller {

    public function __construct(MailSender $mailSender)
    {
        $this->mailSender = $mailSender;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('webpage.contacto');
	}

	/**
	 * Manage a newly created request
	 *
	 * @return Response
	 */
	public function post(ContactRequest $request)
	{
        $this->mailSender->contactMail($request);
        return redirect('contacto');
	}

}
