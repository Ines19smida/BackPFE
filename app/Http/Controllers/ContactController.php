<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' =>'string|required',
            'numTel' => 'string|required',
            'email' => 'string|required',
            'sujet' => 'string|required',
            'question' => 'string|required',
            'user_id' => 'required',

        ]);
        Contact::create($request->all());
        return ['message' => 'ok'];
    }

    public function getCondiContact($id)
    {
        $utilisateur =User::find($id);
        $contacts_user=$utilisateur->contacts;

        return $contacts_user;
    }
}
