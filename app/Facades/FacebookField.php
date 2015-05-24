<?php namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FacebookField extends Facade{

    /**
     * Get the registered name of a component
     *
     * @return string
     */
    protected static function getFacadeAccessor(){ return 'facebookField'; }
}
