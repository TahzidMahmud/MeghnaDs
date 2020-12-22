<?php

namespace App\Http\Controllers;

use App\Advisor;
use Illuminate\Http\Request;

use App\Member;

use PDF;

class AdvisorController extends Controller
{
   public function index(){

        $board_members=Advisor::all();
        return view('advisor.index',compact('board_members'));

   }
   public function create(){
       return view('advisor.create');
   }

   public function store(Request $request){
    $board_members=new Advisor;
    $name=Member::findOrFail($request->member);
    $board_members->member_id=$request->member;
    $board_members->post=$request->post;
    $board_members->name=$name->name;
    $board_members->from=$request->from;
    $board_members->to=$request->to;
    $board_members->motivation=$request->motivation;
    $board_members->save();

    return redirect()-> route('advisor.index')->with('msg'," Board Member Added Successfully..!!");

   }
   public function edit(Request $request){

    $D_member=Advisor::findOrFail($request->id);

     return view('advisor.update' ,compact('D_member'));

   }

   public function update(Request $request){


    $D_member=Advisor::findOrFail($request->id);
    $D_member->update([

                'member_id'=>$request['member_id'],
                'post'=>$request['post'],
                'name'=>$request['name'],
                'from'=>$request['from'],
                'to'=>$request['to'],
                'motivation'=>$request['motivation'],

    ]);
    return redirect()-> route('advisor.index')->with('msg'," Board information Updated Successfully..!!");




   }

   public function delete($id)
   {
    Advisor::findOrFail($id)->delete();
    return redirect()-> route('advisor.index')->with('msg'," Board Member Deleted Successfully..!!");
   }

   public function director_pdf(Request $request){
    $board_members=Advisor::all();

    $pdf = PDF::loadView('advisor.pdf', compact('board_members'));
    return $pdf->setPaper('legal', 'portrait')->download('myfile.pdf');

   }
}
