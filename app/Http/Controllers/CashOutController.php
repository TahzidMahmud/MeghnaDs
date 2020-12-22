<?php

namespace App\Http\Controllers;

use App\BankBalance;
use App\CashOut;
use App\Member;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    public function index()
    {
    	// $cash_out = CashOut::all();

    	return view('cash_out.index');
    }

    public function create()
    {
    	$members = Member::select('members.name', 'members.id')
    					   ->join('users', 'members.user_id', 'users.id')
    					   ->where('users.status', 1)
    					   ->get();
    	return view('cash_out.create', compact('members'));
    }

    public function store(Request $request)
    {

    	$request->validate([

    	    'date' => 'required',

    	]);

    	$total_debit = $request->admistration + $request->entertainment + $request->investment_withdraw;

    	$cash_out = new CashOut;
    	$cash_out->member_id = $request->member;
    	$cash_out->date = $request->date;
    	$cash_out->admistration = $request->admistration;
        $cash_out->entertainment = $request->entertainment;
        $cash_out->investment_withdraws=0;
        $cash_out->investment_withdraw = $request->investment_withdraw;
        $cash_out->purpose=$request->purpose;
    	$cash_out->total_debit = $total_debit;
    	$cash_out->save();

        //decrement bank balance when some cash is out
        BankBalance::find(1)->decrement('total_amount', $total_debit);

    	return redirect()->back()->with('msg', 'Cash Out Added!');
    }

    public function generate(Request $request){

        $from=$request->from_date;
        $to=$request->to_date;
        $cash_out = CashOut::whereBetween('date', [$from, $to])->get();

        return view('cash_out.generate', compact('cash_out'));
    }
    public function edit_delete(){
        return view('cash_out.edit_delete');
    }

    public function edit_delete_generate(Request $request){

        $from=$request->from_date;
        $to=$request->to_date;
        $cash_out = CashOut::whereBetween('date', [$from, $to])->get();


        return view('cash_out.edit_delete_generate', compact('cash_out'));
    }

    public function edit(Request $request){

        $member= CashOut::findOrFail($request->id);
        $id=$request->id;
        BankBalance::find(1)->increment( 'total_amount',$request->total_debit);


        return view('cash_out.edit', compact('member','id'));
    }
    public function destroy( $id)
    {

        $entry=CashOut::findOrFail($id);
        BankBalance::find(1)->increment( 'total_amount',$entry->total_debit);
        $entry->delete();

        return redirect()->route('cash_out.index')->with('msg', 'Deletede Successful!');
    }

    public function update( Request $request)
    {

        $member=CashOut::find($request->id);
        $total_debit=$request->admistration+$request->entertainment+$request->investment_withdraw;

        $member->update(
            [
                'date'=>$request['date'],

                'admistration'=>$request['admistration'],
                'entertainment'=>$request['entertainment'],

                'investment_withdraw'=>$request['investment_withdraw'],
                'purpose'=>$request['purpose'],
                'total_debit'=>$total_debit

            ]

            );
            BankBalance::find(1)->decrement('total_amount', $total_debit);
          return redirect()->route('cash_out.index')->with('msg', 'Updated Successful!');
    }




}
