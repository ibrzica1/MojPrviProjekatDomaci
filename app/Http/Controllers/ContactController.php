<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;

use function Laravel\Prompts\error;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function allContacts()
    {
        $contacts = Contact::all();
        return view('allContacts', compact('contacts'));
    }

    public function sendContact(Request $request)
    {
       
        $request->validate([
            "email" => "required|string",
            "subject" => "required|string",
            "description" => "required|string|min:5"
        ]);

        Contact::create([
            "email" => $request->get('email'),
            "title" => $request->get('subject'),
            "message" => $request->get('description')
        ]);

        return redirect("/shop");
    }

    public function delete($contact)
    {
        $contact = Contact::where(["id" => $contact])->first();
        if($contact === null){
            die("Contact doesnt exist");
        }

        $contact->delete();

        return redirect()->back();
    }
}
