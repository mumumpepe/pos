<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{
    public function users() {
        if(! Auth::user()) {
            abort(403);
        }

        $users = User::simplePaginate(5);
        return view('admin.blank', [
            'users' => $users,
        ]);
    }

    public function index() {
        if(! Auth::user()) {
            abort(403);
        }

        //date from today
        $one = date('Y-m-d');
        $two = date('Y-m-d', strtotime('-1 days'));
        $three = date('Y-m-d', strtotime('-2 days'));
        $four = date('Y-m-d', strtotime('-3 days'));
        $five = date('Y-m-d', strtotime('-4 days'));
        $six = date('Y-m-d', strtotime('-5 days'));
        $seven = date('Y-m-d', strtotime('-6 days'));

        //getting total sales per day
        $day_one = Sales::whereBetween('created_at', [$one, $one.'23:59:59'])->get();
        $sum_one = $day_one->sum('total_price');

        $day_two = Sales::whereBetween('created_at', [$two, $two.'23:59:59'])->get();
        $sum_two = $day_two->sum('total_price');

        $day_three = Sales::whereBetween('created_at', [$three, $three.'23:59:59'])->get();
        $sum_three = $day_three->sum('total_price');

        $day_four = Sales::whereBetween('created_at', [$four, $four.'23:59:59'])->get();
        $sum_four = $day_four->sum('total_price');

        $day_five = Sales::whereBetween('created_at', [$five, $five.'23:59:59'])->get();
        $sum_five = $day_five->sum('total_price');

        $day_six = Sales::whereBetween('created_at', [$six, $six.'23:59:59'])->get();
        $sum_six = $day_six->sum('total_price');

        $day_seven = Sales::whereBetween('created_at', [$seven, $seven.'23:59:59'])->get();
        $sum_seven = $day_seven->sum('total_price');


        return view('admin.index', [
            'day_one' => $sum_one,
            'day_two' => $sum_two,
            'day_three' => $sum_three,
            'day_four' => $sum_four,
            'day_five' => $sum_five,
            'day_six' => $sum_six,
            'day_seven' => $sum_seven,
        ]);
    }

    public function sales() {
        if(! Auth::user()) {
            abort(403);
        }

        $sales = Sales::latest()->simplePaginate(10);
        return view('admin.tables', [
            'sales' => $sales,
        ]);
    }

    public function report() {
        return view ('admin.report');
    }

    public function create() {
        if(! Auth::user()) {
            abort(403);
        }

        $attributes = request()->validate([
           'start_date' => ['required'],
           'end_date' => ['required'],
        ]);

        $start_date = request('start_date');
        $end_date = request('end_date');

         $sales  = Sales::whereBetween('created_at', [$start_date, $end_date.' 23:59:59'])->get();
         $total = $sales->sum('total_price');

       return view('admin.generate-report', [
           'sales' => $sales,
           'start_date' => $start_date,
           'end_date' => $end_date,
           'grand_total' => $total,
       ]);
    }

    public function pdf($start, $end) {
        if(! Auth::user()) {
            abort(403);
        }
            $sales = Sales::get();

            $sales  = Sales::whereBetween('created_at', [$start, $end.' 23:59:59'])->get();
            $total = $sales->sum('total_price');

           $pdf = PDF::loadView('admin.pdf', [
               'sales' => $sales,
               'start_date' => $start,
               'end_date' => $end,
               'grand_total' => $total,
           ]);

           $pdf->setPaper('A4', 'landscape');

            return $pdf->download('report_from_'.$start.'_to_'.$end.'.pdf');
    }

}
