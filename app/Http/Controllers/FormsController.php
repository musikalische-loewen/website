<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\ContactRequest;
use App\Http\Requests\Forms\MembershipRequest;
use App\Mail\Forms\ContactMail;
use App\Mail\Forms\MembershipMail;
use Illuminate\Support\Facades\Mail;
use Spatie\Honeypot\ProtectAgainstSpam;

class FormsController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(ProtectAgainstSpam::class);
    }

    /**
     * Process the contact form request.
     *
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(ContactRequest $request)
    {
        Mail::send(new ContactMail($request->all()));
        return redirect()->back()->with('success', 'Ihre Anfrage wurde erfolgreich übermittelt. Wir melden uns bald!');
    }

    /**
     * Process the membership form request.
     *
     * @param MembershipRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function membership(MembershipRequest $request)
    {
        Mail::send(new MembershipMail($request->all()));
        return redirect()->back()->with('success', 'Ihre Anfrage wurde erfolgreich übermittelt. Wir melden uns bald!');
    }
}
