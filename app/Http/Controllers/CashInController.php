<?php

namespace App\Http\Controllers;

use App\BankBalance;
use App\CashIn;
use App\Member;
use Illuminate\Http\Request;

class CashInController extends Controller
{
    public function index()
    {
    	// $cash_in = CashIn::all();
    	 return view('cash_in.index');
    }

    public function create()
    {
    	$members = Member::select('members.name', 'members.id')
    					   ->join('users', 'members.user_id', 'users.id')
    					   ->where('users.status', 1)

    					   ->get();
    	return view('cash_in.create', compact('members'));
    }

    public function store(Request $request)
    {
        $member=$request->member;
        $premium=$request->premium;
            if(is_null($member)){
                $member=36;
                $premium=0;
            }

    	$total_credit = $request->premium + $request->admistration + $request->fine + $request->profit;

    	$cash_in = new CashIn;
    	$cash_in->member_id = $member;
    	$cash_in->date = $request->date;
    	$cash_in->premium = $premium;
    	$cash_in->admistration = $request->admistration;
        $cash_in->fine = $request->fine;
        $cash_in->source=$request->source;
    	$cash_in->profit = $request->profit;
    	$cash_in->comments = $request->comments;
    	$cash_in->total_credit = $total_credit;
    	$cash_in->save();

        //increment bank balance when some cash is in
        BankBalance::find(1)->increment('total_amount', $total_credit);

    	return redirect()->back()->with('msg', 'Cash In Added!');
    }


    public function generate(Request $request){

        $from=$request->from_date;
        $to=$request->to_date;
        $cash_in = CashIn::whereBetween('date', [$from, $to])->get();

        return view('cash_in.generate', compact('cash_in'));
    }


    public function edit_delete_generate(Request $request){

        $from=$request->from_date;
        $to=$request->to_date;
        $cash_in = CashIn::whereBetween('date', [$from, $to])->get();

        return view('cash_in.edit_delete_generate', compact('cash_in'));
    }


    public function edit_delete(){
        return view('cash_in.edit_delete');
    }
    public function destroy( $id)
    {

        $entry=Cashin::findOrFail($id);
        BankBalance::find(1)->decrement( 'total_amount',$entry->total_credit);
        $entry->delete();

        return redirect()->route('cash_in.index')->with('msg', 'Deleted Successful!');
    }

    public function edit( Request $request)
    {


        $member= Cashin::findOrFail($request->id);
        BankBalance::find(1)->decrement( 'total_amount',$request->total_credit);

        return view('cash_in.edit', compact('member'));
    }

    public function update(Request $request){
        $member=Cashin::find($request->id);




        $total_credit = $request->premium + $request->admistration + $request->fine + $request->profit;
        if(is_null($member->member_id == 36)){
            $member->date = $request->date;
            $member->premium="0";
            $member->profit=$request->profit;
            $member->comments = $request->comments;
            $member->total_credit = $total_credit;
            $member->save();

        }
        else{
            $member->update(
                [
                    'date'=>$request['date'],
                    'premium'=>$request['premium'],
                    'admistration'=>$request['admistration'],
                    'fine'=>$request['fine'],
                    'profit'=>$request['profit'],
                    'comments'=>$request['comments'],
                    'total_credit'=>$total_credit
                ]

            );

        }

        BankBalance::find(1)->increment('total_amount', $total_credit);

        return redirect()->route('cash_in.index')->with('msg', 'Updated Successful!');


    }
}
