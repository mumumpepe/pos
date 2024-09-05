<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function store(){
        //validation
 $sales_atttributes = request()->validate([
     'product_name' => ['required'],
     'quantity' => ['required'],
     'unity_price' => ['required'],
     'total_price' => ['required']
 ]);
        //insertion into database
        $sales = Sales::create($sales_atttributes);

        return redirect('/forms');
    }
}
