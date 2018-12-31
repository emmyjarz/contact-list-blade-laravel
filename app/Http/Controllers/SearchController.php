<?php
//didn't use this controller coz using datatables plugin instead
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $query = $request->input('query');
        $contacts = Contact::where('firstname', 'LIKE', '%'.$query.'%')
                            ->orWhere('lastname', 'LIKE', '%'.$query.'%')
                            ->orWhere('email', 'LIKE', '%'.$query.'%')
                            ->orWhere('phone', 'LIKE', '%'.$query.'%')
                            ->paginate(10);
        if(count($contacts)>0){
            return view('contacts.index', compact('contacts'));
        }else{
            return view('contacts.noresult');
        }
    } 
}
