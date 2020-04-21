<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Contact;
use App\Address;
use Mapper;
use View;

class ContactController extends Controller
{
    public function __construct()
    {
        View::share('URL_HTTPS', env('APP_SECURE'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index')->with([
            'contacts' => Contact::orderBy('firstname', 'asc')->get()
        ]);
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
        //Validation
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:contacts',
            'address1' => 'required_with:zip',
            'zip' => 'required_with:address1|digits:5|nullable',
        ]);

        $post = $request->all();

        try {
            //Create contact
            $contact = Contact::create($post);

            //Create address
            if (!empty($post['address1']) && !empty($post['zip'])) {
                $contact->address()->create($post);
            }
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

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
        try {
            $address = $contact->address;

            //Get latitude and longtitude to make google map
            $location = Address::getLocation($address);
            Mapper::map($location['lat'], $location['long']);

            //Make phone number pretty
            if (!empty($contact->phone)) {
                $contact->phone = Contact::phoneFormat($contact->phone);
            }
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        return view('contacts.show')->with([
            'contact' => $contact
        ]);
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
    public function update(Request $request, Contact $contact)
    {
        //Validation
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($contact->id),
            ],
            'address1' => 'required_with:zip',
            'zip' => 'required_with:address1|digits:5|nullable',
        ]);
        $post = $request->all();

        try {
            //Update Contact
            $contact->update($post);

            $address = $contact->address;

            //Create or Update address
            if (!empty($post['address1']) && !empty($post['zip'])) {
                empty($address) ?  $contact->address()->create($post) : $address->update($post);
            }
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }

        session()->flash('message', 'Your contact has been updated.');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
        }
        return redirect('/');
    }
}
