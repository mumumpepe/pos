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

    public function report() {
        return view ('admin.report');
    }

    public function create() {
        $attributes = request()->validate([
           'start_date' => ['required'],
           'end_date' => ['required'],
        ]);

        $start_date = request('start_date');
        $end_date = request('end_date');

         $sales  = Sales::whereBetween('created_at', [$start_date, $end_date.' 23:59:59'])->simplePaginate(10);
         $total = $sales->sum('total_price');

       return view('admin.generate-report', [
           'sales' => $sales,
           'start_date' => $start_date,
           'end_date' => $end_date,
           'grand_total' => $total,
       ]);
    }

}
