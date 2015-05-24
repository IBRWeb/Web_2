<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;



class Administrator extends Model implements AuthenticatableContract{

    use Authenticatable;

    protected $fillable = ['username', 'password', 'name', 'role'];

    protected $hidden = ['password' ,'remember_token'];

    public function setPasswordAttribute($value)
    {
        if(!empty($value))
        {
            $this->attributes['password'] = Hash::make($value);
        }
    }



}