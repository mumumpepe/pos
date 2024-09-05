<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store() {
        $customer_attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'zip' => ['required'],
            'phone' => ['required']
        ]);

        $customer = Customers::create($customer_attributes);

    }
}
