<?php

namespace App\Http\Controllers;

use App\CashIn;
use App\Investment;
use App\Member;
use PDF;
use App\CashOut;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Str;




class ReportController extends Controller
{
   public $cash_in_info=[];
    public $cash_out_info=[];

    public $member_name;
    public function create()
    {
    	return view('reports.create');
    }

    public function search(){
        $members=Member::get();
        return view('reports.member_report_create',compact('members'));
    }



    public function show(Request $request){

        $name = $request->member_name;
        $from=$request->from_date;
        $to=$request->to_date;

        $this->member_name=$name;
        $id=Member::select('user_id','id')->where('name' , '=', $name)->first();


        $cash_in=CashIn::select( 'cash_ins.total_credit', 'cash_ins.comments','cash_ins.date')
        ->where('cash_ins.member_id','=',$id->id)
        -> whereBetween('date', [$from, $to])
        ->orderBy('cash_ins.date','ASC')
        ->get();



        $cash_out=CashOut::select( 'cash_outs.total_debit', 'cash_outs.purpose','cash_outs.date')
        ->where('cash_outs.member_id','=',$id->user_id)
        -> whereBetween('date', [$from, $to])
        ->orderBy('cash_outs.date','ASC')
        ->get();

        return view('reports.individual_member_report', compact('cash_in','cash_out','name','from','to'));
    }

    public function index(Request $request)
    {
    	$month = $request->month;
    	$year = $request->year;



          $cashin=CashIn::select('cash_ins.member_id', 'cash_ins.admistration as in_admistration', 'cash_ins.premium', 'cash_ins.fine', 'cash_ins.profit', 'cash_ins.total_credit', 'cash_ins.comments','cash_ins.date')
                ->whereMonth('cash_ins.date', $month)
                ->whereYear('cash_ins.date', $request->year)
                ->get();


           $cashout=CashOut::select('cash_outs.member_id','cash_outs.admistration as out_admistration', 'cash_outs.entertainment', 'cash_outs.investment_withdraw', 'cash_outs.total_debit','cash_outs.date','cash_outs.purpose')
                     ->whereMonth('cash_outs.date', $month)
                     ->whereYear('cash_outs.date', $request->year)
                     ->get();

        $investments = Investment::orderBy('created_at')
                                 ->whereMonth('created_at', $month)
                                 ->whereYear('created_at', $year)
                                 ->get();

    	 return view('reports.index', compact('cashin','cashout', 'month', 'year', 'investments'));
    }


    public function reports_pdf(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $cashin=CashIn::select('cash_ins.member_id', 'cash_ins.admistration as in_admistration', 'cash_ins.premium', 'cash_ins.fine', 'cash_ins.profit', 'cash_ins.total_credit', 'cash_ins.comments','cash_ins.date')
                ->whereMonth('cash_ins.date', $month)
                ->whereYear('cash_ins.date', $request->year)
                ->get();

           $cashout=CashOut::select('cash_outs.member_id','cash_outs.admistration as out_admistration', 'cash_outs.entertainment', 'cash_outs.investment_withdraw', 'cash_outs.total_debit','cash_outs.date','cash_outs.purpose')
                     ->whereMonth('cash_outs.date', $month)
                     ->whereYear('cash_outs.date', $request->year)
                     ->get();

        $investments = Investment::orderBy('created_at')
                                 ->whereMonth('created_at', $month)
                                 ->whereYear('created_at', $year)
                                 ->get();



        $pdf = PDF::loadView('reports.pdf', compact('cashin','cashout', 'month', 'year', 'investments'));
        return $pdf->setPaper('legal', 'portrait')->download('myfile.pdf');

    }


    public function report_pdf(Request $request)

    {

        $name = $request->name;
        $from=$request->from;
        $to=$request->to;

        $id=Member::select('user_id','id')->where('name' , '=', $name)->first();

        $cash_in=CashIn::select( 'cash_ins.total_credit', 'cash_ins.comments','cash_ins.date')
        ->where('cash_ins.member_id','=',$id->id)
        -> whereBetween('date', [$from, $to])
        ->orderBy('cash_ins.date','ASC')
        ->get();


        $cash_out=CashOut::select( 'cash_outs.total_debit', 'cash_outs.purpose','cash_outs.date')
        ->where('cash_outs.member_id','=',$id->id)
        -> whereBetween('date', [$from, $to])
        ->orderBy('cash_outs.date','ASC')
        ->get();


        $pdf = PDF::loadView('reports.member_report_pdf', compact('cash_in','cash_out', 'name', 'from','to'));
        return $pdf->setPaper('legal', 'portrait')->download('myfile.pdf');

    }

    public function yearly_report(){
        return view('reports.select_time');
    }
    public function yearly_report_generate(Request $request){


        $from_month=$request->starting_month;
        $to_month=$request->ending_month;
        $from_year=$request->starting_year;
        $to_year=$request->ending_year;


        $date=Carbon::createFromDate($from_year, $from_month,"1");
        $date3=Carbon::createFromDate($to_year, $to_month,"31");



        $cash_in_total = CashIn::all()->whereBetween('date', [$date, $date3]);
        $t=$cash_in_total->groupBy(function($d) {

            return Carbon::parse($d->date)->format('y-m');

        });

        $cash_out_total = CashOut::all()->whereBetween('date', [$date, $date3]);

        $out=$cash_out_total->groupBy(function($d) {


            return Carbon::parse($d->date)->format('y-m');
        });


        $months= array("01"=>"January", "02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"Ouctober","11"=>"November","12"=>"December");

        foreach($t as $x => $x_value) {
            $month=substr($x,3);

            $year=chop($x,$month);
            if( array_key_exists($month, $months)){
                $month=$months[$month];

            }
            $premium=0;
            $admin=0;
            $fine=0;
            $profit=0;
            $total_credit=0;
            foreach($x_value as $y => $y_value) {

                $premium=$premium + $y_value->premium;
                $admin=$admin + $y_value->admistration;
                $fine=$fine + $y_value->fine;
                $profit=$profit + $y_value->profit;
                $total_credit=$total_credit + $y_value->total_credit;

          }
          $collection=collect(['from'=>$date,'to'=>$date3, 'year'=>$year,'month'=>$month,'premium'=>$premium,
          'admin'=>$admin,
          'fine'=>$fine,
          'profit'=>$profit,
          'total_credit'=>$total_credit]);
          array_push($this->cash_in_info,$collection);
        }


        foreach($out as $x => $x_value) {
            $month=substr($x,3);
            $year=chop($x,$month);
            if( array_key_exists($month, $months)){
                $month=$months[$month];
            }

            $admin=0;
            $entertainment=0;
            $investment_withdraw=0;
            $total_debit=0;
            foreach($x_value as $y => $y_value) {


                $admin=$admin + $y_value->admistration;
                $entertainment=$entertainment + $y_value->$entertainment;
                $investment_withdraw=$investment_withdraw + $y_value->$investment_withdraw;
                $total_debit=$total_debit + $y_value->total_debit;

          }

          $collection2=collect([ 'year'=>$year,'month'=>$month,
          'admin'=>$admin,
          'entertainment'=>$entertainment,
          'investment_withdraw'=>$investment_withdraw,
          'total_debit'=>$total_debit]);
          array_push($this->cash_out_info,$collection2);
        }
        $cash_in_info=$this->cash_in_info;
        $cash_out_info=$this->cash_out_info;

        $from=$date;
        $to=$date3;

        return view('reports.yearly_report',compact('cash_in_info','cash_out_info','from','to'));


    }
    public function yearly_pdf(Request $request){

        $from=$request->from;
        $to=$request->to;



        $cash_in_total = CashIn::all()->whereBetween('date', [$from, $to]);
        $t=$cash_in_total->groupBy(function($d) {

            return Carbon::parse($d->date)->format('y-m');
        });

        $cash_out_total = CashOut::all()->whereBetween('date', [$from, $to]);
        $out=$cash_out_total->groupBy(function($d) {

            return Carbon::parse($d->date)->format('y-m');
        });


        $months= array("01"=>"January", "02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"Auctober","11"=>"November","12"=>"December");

        foreach($t as $x => $x_value) {
            $month=substr($x,3);
            $year=chop($x,$month);
            if( array_key_exists($month, $months)){
                $month=$months[$month];
            }
            $premium=0;
            $admin=0;
            $fine=0;
            $profit=0;
            $total_credit=0;
            foreach($x_value as $y => $y_value) {

                $premium=$premium + $y_value->premium;
                $admin=$admin + $y_value->admistration;
                $fine=$fine + $y_value->fine;
                $profit=$profit + $y_value->profit;
                $total_credit=$total_credit + $y_value->total_credit;

          }
          $collection=collect(['from'=>$from,'to'=>$to, 'year'=>$year,'month'=>$month,'premium'=>$premium,
          'admin'=>$admin,
          'fine'=>$fine,
          'profit'=>$profit,
          'total_credit'=>$total_credit]);
          array_push($this->cash_in_info,$collection);
        }


        foreach($out as $x => $x_value) {
            $month=substr($x,3);
            $year=chop($x,$month);
            if( array_key_exists($month, $months)){
                $month=$months[$month];
            }

            $admin=0;
            $entertainment=0;
            $investment_withdraw=0;
            $total_debit=0;
            foreach($x_value as $y => $y_value) {


                $admin=$admin + $y_value->admistration;
                $entertainment=$entertainment + $y_value->$entertainment;
                $investment_withdraw=$investment_withdraw + $y_value->$investment_withdraw;
                $total_debit=$total_debit + $y_value->total_debit;

          }

          $collection2=collect([ 'year'=>$year,'month'=>$month,
          'admin'=>$admin,
          'entertainment'=>$entertainment,
          'investment_withdraw'=>$investment_withdraw,
          'total_debit'=>$total_debit]);
          array_push($this->cash_out_info,$collection2);
        }
        $cash_in_info=$this->cash_in_info;
        $cash_out_info=$this->cash_out_info;





        $pdf = PDF::loadView('reports.yearly_pdf', compact('from','to','cash_in_info','cash_out_info'));
        return $pdf->setPaper('legal', 'portrait')->download('myfile.pdf');

    }
}
