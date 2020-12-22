<?php

namespace App\Http\Controllers;

use App\BankBalance;
use App\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index()
    {	
    	$investment_out = Investment::where('purpose', 'cash_out')->get();
    	$investment_in = Investment::where('purpose', 'cash_in')->get();

    	return view('investments.index', compact('investment_out', 'investment_in'));
    }

    public function create()
    {	
    	$investments = Investment::where('purpose', 'cash_out')->where('status', 1)->get();
    	return view('investments.create', compact('investments'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'purpose' => 'required',
    		'amount' => 'required',
    	]);

    	$close = $request->close_investment;
    	$id = $request->investment_field2;

    	$investment = new Investment;
    	$investment->status = 1;
    	$investment->purpose = $request->purpose;
    	$investment->amount = $request->amount;


    	if ($request->purpose == 'cash_in')  
        { 
            $investment->details = $id; 
            //increment bank balance when cash in
            BankBalance::find(1)->increment('total_amount', $request->amount);
        }
    	else 
        { 
            $investment->details = $request->investment_field; 
            //decrement bank balance when cash out
            BankBalance::find(1)->decrement('total_amount', $request->amount);
        }

    	$investment->save();

    	if (!empty($close))  { Investment::where('id', $id)->update(['status' => 0]); }
    	return redirect()->back()->with('msg', 'Investment Added!');
    }
}
