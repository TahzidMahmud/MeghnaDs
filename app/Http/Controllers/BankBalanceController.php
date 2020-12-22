<?php

namespace App\Http\Controllers;

use App\BankBalance;
use Illuminate\Http\Request;

class BankBalanceController extends Controller
{
    public function index()
    {	
    	$balance = BankBalance::first();
    	return view('bank_balance.index', compact('balance'));
    }

    public function edit()
    {
    	return view('bank_balance.edit');
    }

    public function update(Request $request)
    {
    	$request->validate([
    		'amount_option' => 'required',
    		'amount' => 'required'
    	]);

    	if ($request->amount_option == 'increment') 
    	{
    		BankBalance::find(1)->increment('total_amount', $request->amount);
    	}
    	else
    	{
    		BankBalance::find(1)->decrement('total_amount', $request->amount);
    	}

    	return redirect()->back()->with('msg', 'Balance Updated!');
    }

}
