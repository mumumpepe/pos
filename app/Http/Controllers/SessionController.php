<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to login the user
        if(! Auth::attempt($attributes)){
           throw ValidationException::withMessages([
               'email' => 'Sorry, those credentials do not match'
               ]);
        } else {

        //regenerate the session token
        request()->session()->regenerate();

        //fetching role of the user
            $role = User::where('email', request('email'))->first();
            $real_role = $role['role'];
            if($real_role == 'salesman'){
                return redirect('/sales');
            } elseif( $real_role == 'administrator') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/login');
            }

        }
    }
}
