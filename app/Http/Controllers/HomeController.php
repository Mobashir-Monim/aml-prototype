<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $thirty = $this->getLastThirtyDaysCount();
        $seven = $this->getLastSevenDaysCount();
        
        return view('welcome', [
            'thirty' => $thirty,
            'seven' => $seven
        ]);
    }

    public function getLastThirtyDaysCount()
    {
        $now = Carbon::now()->addDays(-30);
        $payments = Payment::select('issue_date', 'amount', 'status')->where('issue_date', '>=', $now)->where('issue_date', '<=', Carbon::now())->get();
        $temp = [];

        foreach ($payments as $payment) {
            if (!array_key_exists($payment->issue_date, $temp))
                $temp[$payment->issue_date] = ['count' => 0, 'sum' => 0];

            $temp[$payment->issue_date]['count'] += 1;
            $temp[$payment->issue_date]['sum'] += $payment->amount;
        }

        ksort($temp);

        return $temp;
    }

    public function getLastSevenDaysCount()
    {
        $now = Carbon::now()->addDays(-7);
        $payments = Payment::select('issue_date', 'amount', 'status')->where('issue_date', '>=', $now)->where('issue_date', '<=', Carbon::now())->get();
        $temp = [];

        foreach ($payments as $payment) {
            if (!array_key_exists($payment->issue_date, $temp))
                $temp[$payment->issue_date] = ['count' => 0, 'sum' => 0];

            $temp[$payment->issue_date]['count'] += 1;
            $temp[$payment->issue_date]['sum'] += $payment->amount;
        }

        ksort($temp);

        return $temp;
    }

    function compare_func($a, $b)
    {
        $t1 = strtotime($a);
        $t2 = strtotime($b);

        return ($t2 - $t1);
    }
}
