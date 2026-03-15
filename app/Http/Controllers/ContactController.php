<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact;
use App\Models\Product;
use App\Repositories\ContactRepository;

use function Laravel\Prompts\error;

class ContactController extends Controller
{
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();    
    }

    public function index()
    {
        return view('contact');
    }

    public function allContacts()
    {
        $contacts = Contact::all();
        return view('allContacts', compact('contacts'));
    }

    public function editContactPage($contactId)
    {
        $contact = $this->contactRepo->getContactById($contactId);
        
        if($contact === null){
            die("Contact doesnt exist");
        }

        return view('editContact',compact('contact'));
    }

    public function sendContact(Request $request)
    {
       
        $request->validate([
            "email" => "required|string",
            "title" => "required|string",
            "message" => "required|string|min:5"
        ]);

        Contact::create([
            "email" => $request->get('email'),
            "title" => $request->get('title'),
            "message" => $request->get('message')
        ]);

        return redirect("/shop");
    }

    public function editContact(Request $request, $contactId)
    {
        
        $request->validate([
            "email" => "required|string",
            "title" => "required|string",
            "message" => "required|string|min:5"
        ]);

        Contact::find($contactId)->update([
            "email" => $request->get('email'),
            "title" => $request->get('title'),
            "message" => $request->get('message')
        ]);

        return redirect()->route('all_contacts');
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
