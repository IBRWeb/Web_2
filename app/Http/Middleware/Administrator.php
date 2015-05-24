<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use SleepingOwl\AdminAuth\Facades\AdminAuth;

class Administrator {

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $role = \AdminAuth::user()->role;

        if($role !== 'superAdmin')
        {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }

}
