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

        return redirect('/sales');

    }

    public function index() {
        $sale = Sales::latest()->simplePaginate(10);
        return view('dashboard.tables', [
            'sales' => $sale
        ]);

    }

    public function edit(Sales $sale) {

        return view('admin.edit-sale', [
            'sale' => $sale
        ]);
    }

    public  function update(Sales $sale){
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

        $sale->update($attributes);

        return redirect('/admin/sales');
    }
}
