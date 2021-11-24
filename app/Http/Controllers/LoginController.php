<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;


class LoginController extends Controller
{
    public function index(Request $request) {
        $error = '';

        if ($request->get('error') == 1) {
            $error = "Username or password does not exist.";
        }

        if ($request->get('error') == 2) {
            $error = "You need to login to access the page.";
        }
        
        return view('site.login', compact('error'));
    }

    public function login(Request $request) {

        // ** Validation
        // rules
        $rules = [
            'email' => 'email',
            'password' => 'required'
        ];

        // messages
        $messages = [
            'email.email' => 'Invalid username or password.',
            'password.required' => 'Invalid username or password.',
        ];

        $request->validate($rules, $messages);
        // ** end Validation

        // get form parameters from request
        $email = $request->get('email');
        $password = $request->get('password');

        // check if user exists in database
        $user  = new User();
        $pass  = Hash::check($password, $user->password);
        $usuario = $user->where('email', $email)->where('password', $pass)->get()->first();

        // if user exists, create a new session
        if (isset($usuario->name)) {
            // start a session
            session_start();
            $_SESSION['name']  = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect(route('app.home'));
        }
        else {
            return redirect(route('site.login').'?error=1');
        }
    }

    public function logout() {
        session_destroy();
        return redirect(route('site.index'));        
    }
}
