<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'contact_id',
        'type',
        'address1',
        'address2',
        'city',
        'state',
        'zip'
    ];
}
