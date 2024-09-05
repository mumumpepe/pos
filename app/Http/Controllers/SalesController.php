<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store() {
        $attributes = request()->validate([
            'product_name' => ['required'],
            'quantity' => ['required'],
            'unity_price' => ['required'],
            'total_price' => ['required'],
            'customer_name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'zip' => ['required'],
            'phone' => ['required']
        ]);

       $job = Sales::create($attributes);

        return redirect('/forms');

    }
}
