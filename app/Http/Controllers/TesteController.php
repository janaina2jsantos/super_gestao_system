<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(int $p1, int $p2) {
        // echo "A soma é: " .($p1 + $p2);
        $soma = $p1 + $p2;
        return view('site.teste', compact('p1', 'p2', 'soma'));
    }
}
