<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;


class AboutController extends Controller
{
    private $teste;

    public function __construct() {

    }

    public function index($company) {
        return view('site.about', compact('company'));
    }

}
