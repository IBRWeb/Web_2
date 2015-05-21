<?php namespace App\Http\Requests;

use Illuminate\Http\Request as HttpRequest;

class PrayerRequest extends Request {

    public function __construct(HttpRequest $request)
    {
        $this->request = $request;
        $this->data = $this->resolveData($request);
    }


    /**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name'    => 'required',
            'phone'   => 'numeric',
            'email'   => 'required|email',
            'petitions'=> 'required',
            'visit'   => 'boolean',
            'street'  => 'required_if:visit,1',
            'town'    => 'required_if:visit,1',
            'state'   => 'required_if:visit,1'
        ];
	}

    public function resolveData()
    {
        $petitioner_name = $this->request->get('name');
        $petitioner_phone = $this->request->get('phone');
        $petitioner_email = $this->request->get('email');
        $petition = $this->request->get('petitions');
        if($this->request->get('visit')){
            $visit = $this->request->get('visit');
            $address = implode(', ', [$this->request->get('street'), $this->request->get('town'), $this->request->get('state')]);
        }else{
            $visit = 0;
            $address = null;
        }

        return compact('petitioner_name', 'petitioner_phone', 'petitioner_email', 'petition', 'visit', 'address');
    }

    public function getData()
    {
        return $this->data;

    }

}