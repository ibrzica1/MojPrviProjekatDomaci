<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function getContactById($contactId)
    {
        return Contact::where(["id" => $contactId])->first();
    }

    public function saveContact($request)
    {
        $this->contactModel->create([
            "email" => $request->get('email'),
            "title" => $request->get('title'),
            "message" => $request->get('message')
        ]);
    }
}