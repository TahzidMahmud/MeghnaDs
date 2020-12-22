<?php

namespace App\Http\Controllers;

use App\BankBalance;
use App\CashIn;
use App\CashOut;
use App\Investment;
use App\Member;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_cash_in = CashIn::all()->sum('total_credit');
        $all_cash_out = CashOut::all()->sum('total_debit');
        $members = Member::all()->count();
        $cash_out = CashOut::whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=',date('yy'))->sum('total_debit');
        $cash_in = CashIn::whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=',date('yy'))->sum('total_credit');

        $investments_in = Investment::whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=',date('yy'))->sum('amount');
        $investments_out = Investment::whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=',date('yy'))->sum('amount');
        $total_profit=CashIn::all()->sum('profit');
        $mothly_profit= CashIn::whereMonth('created_at', '=', date('m'))->whereYear('created_at', '=',date('yy'))->sum('profit');
        $bank_balance = BankBalance::first();
        $all_investments_in = Investment::where('purpose', 'cash_in')->sum('amount');
        $all_investments_out = Investment::where('purpose', 'cash_out')->sum('amount');
        $investments_running = Investment::where('status', 1)->count();
        $total_running_investment_amount=Investment::where('status', 1)->sum('amount');
        $investments_closed = Investment::where('status', 0)->count();

        return view('dashboard', compact('all_cash_in', 'all_cash_out', 'members', 'cash_out', 'cash_in', 'investments_in', 'investments_out', 'bank_balance', 'all_investments_in', 'all_investments_out', 'investments_closed', 'investments_running','total_running_investment_amount','total_profit'));
    }

    public function show()
    {
        return view('welcome');

    }
}
