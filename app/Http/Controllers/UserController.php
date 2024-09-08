<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store()
    {
        //validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'role' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(5)]
        ]);


        //create the user
        $user = User::create($attributes);

        //log in
        Auth::login($user);

        //redirect somewhere
        return redirect('/admin/users');
    }

    public function edit(User $id) {
        return view('admin.edit-user', [
            'id' => $id,
        ]);
    }

    public function update(User $id){
        $attributes = request()->validate([
           'first_name'=> ['required'],
           'last_name' => ['required'],
           'email' => ['required'],
           'password' => ['required'],
        ]);

        $id->update($attributes);

        return redirect('/admin/users');
    }

    public function destroy($id){
       User::findOrFail($id)-> delete();

        return redirect('/admin/users');
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

}
