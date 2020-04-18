<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Contact;
use Mapper;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('firstname', 'asc')->get();

        foreach ($contacts as $contact) {
            if ($contact->phone != '') {
                $contact->phone = Contact::phoneFormat($contact->phone);
            }
        }
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:contacts'
        ]);
        Contact::create([
            'firstname' => trim(strtolower(request()->input('firstname'))),
            'lastname' => trim(strtolower(request()->input('lastname'))),
            'email' => trim(strtolower(request()->input('email'))),
            'phone' => trim((request()->input('phone'))),
            'birthday' => request()->input('birthday'),
            'address1' => trim(strtolower(request()->input('address1'))),
            'address2' => trim(strtolower(request()->input('address2'))),
            'city' => trim(strtolower(request()->input('city'))),
            'state' => request()->input('state'),
            'zip' => request()->input('zip'),
        ]);
        session()->flash('message', 'Your contact has been added.');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $address = $contact->address1 . " " . $contact->address2 . " " . $contact->city . " " . $contact->state . " " . $contact->zip;
        $prepAddr = str_replace(' ', '+', $address);
        $geocode = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$prepAddr&sensor=false&key=" . env('GOOGLE_API_KEY'));
        $output = json_decode($geocode);
        if (count($output->results) == 0) {
            $lat = "34.0522342";
            $long = "-118.2436849";
        } else {
            $lat = $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;
        }
        Mapper::map($lat, $long);
        if ($contact->phone != '') {
            $contact->phone = Contact::phoneFormat($contact->phone);
        }
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit')->with([
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => [
                'required',
                Rule::unique('contacts')->ignore($id),
            ],
        ]);
        $contact = Contact::find($id);
        $contact->firstname = trim(strtolower(request()->input('firstname')));
        $contact->lastname = trim(strtolower(request()->input('lastname')));
        $contact->email = trim(strtolower(request()->input('email')));
        $contact->phone = trim((request()->input('phone')));
        $contact->birthday = request()->input('birthday');
        $contact->address1 = trim(strtolower(request()->input('address1')));
        $contact->address2 = trim(strtolower(request()->input('address2')));
        $contact->city = trim(strtolower(request()->input('city')));
        $contact->state = request()->input('state');
        $contact->zip = request()->input('zip');
        $contact->save();
        session()->flash('message', 'Your contact has been updated.');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('/');
    }
}
