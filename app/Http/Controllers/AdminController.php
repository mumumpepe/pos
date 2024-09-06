<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users() {
        $users = User::simplePaginate(5);
        return view('admin.blank', [
            'users' => $users,
        ]);
    }

    public function sales() {
        $sales = Sales::latest()->simplePaginate(10);
        return view('admin.tables', [
            'sales' => $sales,
        ]);
    }

}
