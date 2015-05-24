<?php namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class FormField extends Facade{

    /**
     * Get the registered name of a component
     *
     * @return string
     */
    protected static function getFacadeAccessor(){ return 'formField'; }
}