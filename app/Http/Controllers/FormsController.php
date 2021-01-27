<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\ContactRequest;
use App\Http\Requests\Forms\MembershipRequest;
use App\Mail\Forms\ContactMail;
use Illuminate\Support\Facades\Mail;

class FormsController extends Controller
{
    /**
     * Process the contact form request
     */
    public function contact(ContactRequest $request)
    {
        Mail::send(new ContactMail($request->all()));
        return redirect()->back()->with('success', 'Ihre Anfrage wurde erfolgreich übermittelt. Wir melden uns bald!');
    }

    /**
     * Process the membership form request
     */
    public function membership(MembershipRequest $request)
    {

    }
}
