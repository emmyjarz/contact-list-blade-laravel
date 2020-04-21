<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'birthday',
    ];
    public function delete()
    {
        $this->address()->delete();

        return parent::delete();
    }
    public function address()
    {
        return $this->hasOne('App\Address');
    }
    public static function phoneFormat($phone)
    {
        // substr_replace(string,replacement,start,length)
        return substr_replace(substr_replace($phone, '-', 3, 0), '-', 7, 0);
    }
}
