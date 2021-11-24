<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactReason;


class HomeController extends Controller
{
    public function index() {
        $contact_reasons = ContactReason::all();
        return view('site.index', compact('contact_reasons'));
    }
}
