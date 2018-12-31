<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'email','phone','birthday','address1','address2','city','state','zip'
    ];
    public static function phoneFormat($phone)
    {
        // substr_replace(string,replacement,start,length)
        return substr_replace(substr_replace($phone,'-',3,0),'-',7,0);
    }
}
