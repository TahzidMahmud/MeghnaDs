<?php

namespace App\Http\Controllers;
use App\Member;
use Illuminate\Http\Request;
use PDF;

class OthersController extends Controller
{
    public function number_show(){

        return view('other_blades.number_list');
    }
    public function number_edit(Request $request){
        $member = Member::find($request->id);
        $member->update([ 'remarks_number' => $request->remarks ]);
        return  redirect()->route('others.number')->with('msg','Updated successfully..!!');
    }
    public function number_pdf(Request $request){

        $pdf = PDF::loadView('other_blades.number_list_pdf');
        return $pdf->setPaper('legal', 'portrait')->download('myfile.pdf');


    }

    public function blood_group_show(){
        return view('other_blades.blood_list');
    }
    public function blood_group_edit(Request $request){
        $member = Member::find($request->id);
        $member->update([ 'remarks_blood' => $request->remarks ]);
        return  redirect()->route('others.blood_group')->with('msg','Updated successfully..!!');
    }
    public function blood_group_pdf(Request $request){

        $pdf = PDF::loadView('other_blades.blood_list_pdf');
        return $pdf->setPaper('legal', 'portrait')->download('myfile.pdf');


    }
    public function bday_show(){
        return view('other_blades.birthday_list');
    }

    public function bday_edit(Request $request){
        $member = Member::find($request->id);
        $member->update([ 'remarks_birthday' => $request->remarks ]);
        return  redirect()->route('others.bday')->with('msg','Updated successfully..!!');
    }
    public function bday_pdf(Request $request){

        $pdf = PDF::loadView('other_blades.birthday_list_pdf');
        return $pdf->setPaper('legal', 'portrait')->download('myfile.pdf');
    }
}
