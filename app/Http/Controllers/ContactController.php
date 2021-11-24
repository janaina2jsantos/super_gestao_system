<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactReason;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function create() {
        $contact_reasons = ContactReason::all();
        return view('site.contact', compact('contact_reasons'));
    }

    public function store(Request $request) {

        $request->validate([
            'contact_reason_id' => 'required',
            'name'  => 'required|min:3|max:40',
            'phone' => 'required',
            'email' => 'email|unique:site_contacts',
            'message' => 'required|max:2000'
        ]);

        $contact = new \App\Models\SiteContact;
        $contact->contact_reason_id = $request->input('contact_reason_id');
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();

        $reason = $contact->contact_reason_id;
        $name = $contact->name;
        $phone = $contact->phone;
        $email =$contact->email;
        $message = $contact->message; 

        Mail::to('your_email@gmail.com')->send(new \App\Mail\SiteContact($reason, $name, $phone, $email, $message));

        return redirect()->route('site.index', ['msg' => 'Contact registered successfully. Our team will return soon!']);
    }
}
