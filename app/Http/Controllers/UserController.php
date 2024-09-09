<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function update_password(User $id) {
        $password = request()->validate([
            'password' => ['required'],
            ]);

        $id->update($password);

       return redirect ('/account')->with('success', "PASSWORD UPDATE SUCCESSFULLY");
    }

    public function uploadImage(Request $request, User $id)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('public/images');
        $file = basename($path);

       //updating path
        $id->update(array('image_path' => $file));

        return redirect('/account');
    }


}
