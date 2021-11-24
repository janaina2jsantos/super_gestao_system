<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {

        $user_name = ($_SESSION['name']);

        return view('app.home', compact('user_name'));
    }
}
