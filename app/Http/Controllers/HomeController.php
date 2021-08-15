<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Recipient;
use App\Models\Project;
use App\Models\BankAccount;
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
        $days = is_null(request()->days) ? -30 : -1 * request()->days;
        $nRecords = $this->getLastNDaysCount($days);

        return view('welcome', [
            'nRecords' => $nRecords,
            'days' => $days
        ]);
    }

    public function getLastNDaysCount($days)
    {
        $now = Carbon::now()->addDays($days);
        $payments = Payment::select('issue_date', 'amount', 'status')->where('issue_date', '>=', $now)->where('issue_date', '<=', Carbon::now())->get();
        $temp = [];

        foreach ($payments as $payment) {
            if (!array_key_exists($payment->issue_date, $temp))
                $temp[$payment->issue_date] = ['count' => 0, 'sum' => 0];

            $temp[$payment->issue_date]['count'] += 1;
            $temp[$payment->issue_date]['sum'] += $payment->amount;
        }

        ksort($temp);

        return array_map(array($this, "avgTransactionAmount"), $temp);
    }

    function avgTransactionAmount($x)
    {
        $x['avg'] = round($x['sum'] / $x['count']);

        return $x;
    }

    public function addTransaction()
    {
        return view('transaction');
    }

    public function storeTransaction(Request $request)
    {
        Payment::create([
            'recipient_id' => Recipient::where('name', $request->recipient)->first()->id,
            'project_id' => Project::where('name', $request->project)->first()->id,
            'bank_account_id' => BankAccount::where('bank', explode(" - ", $request->account)[0])->where('account', explode(" - ", $request->account)[1])->first()->id,
            'issue_date' => Carbon::now()->toDateString(),
            'type' => $request->type,
            'identifier' => $request->identifier,
            'amount' => $request->amount,
            'remarks' => $request->remarks
        ]);

        return redirect()->route('transaction.get');
    }
}
