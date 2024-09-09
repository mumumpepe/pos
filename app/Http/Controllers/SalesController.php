<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store() {
        $attributes = request()->validate([
            'product_name' => ['required'],
            'quantity' => ['nullable'],
            'unity_price' => ['nullable'],
            'total_price' => ['required'],
            'customer_name' => ['nullable'],
            'email' => ['nullable'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'country' => ['nullable'],
            'zip' => ['nullable'],
            'phone' => ['nullable']
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
            'quantity' => ['nullable'],
            'unity_price' => ['nullable'],
            'total_price' => ['required'],
            'customer_name' => ['nullable'],
            'email' => ['nullable'],
            'address' => ['nullable'],
            'city' => ['nullable'],
            'country' => ['nullable'],
            'zip' => ['nullable'],
            'phone' => ['nullable']
        ]);

        $sale->update($attributes);

        return redirect('/admin/sales');
    }

    public function destroy ($sale){

        Sales::findOrFail($sale)->delete();

        return redirect('/admin/sales');

    }

    public function profile() {
        return view ('dashboard.profile-management');
}

}
