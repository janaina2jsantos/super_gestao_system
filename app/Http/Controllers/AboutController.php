<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;


class AboutController extends Controller
{
    private $teste;

    public function __construct() {
        // $this->middleware(LogAcessoMiddleware::class);
        // $this->teste();
    }

    public function index($company) {
        return view('site.about', compact('company'));
    }

    // public function teste() {
    //     $this->teste = "Eu sou o construtor!";
    //     echo $this->teste;
    // }
}
