<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'contact_id',
        'type',
        'address1',
        'address2',
        'city',
        'state',
        'zip'
    ];
    public static function getLocation($address)
    {
        //Set default location at Los Angeles
        $geometry = [
            'lat' => "34.0522342",
            'long' => "-118.2436849"
        ];

        //Get lat and long for provided address
        if (!empty($address)) {
            $prepAddr = str_replace(' ', '+', $address->address1 . " " . $address->address2 . " " . $address->city . " " . $address->state . " " . $address->zip);
            $output = json_decode(file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=" . env('GOOGLE_API_KEY')));
            if (!empty($output->results)) {
                $geometry['lat'] = $output->results[0]->geometry->location->lat;
                $geometry['long'] = $output->results[0]->geometry->location->lng;
            }
        }
        return $geometry;
    }
}
