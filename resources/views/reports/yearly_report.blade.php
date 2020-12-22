@extends('layouts.master')
@section('page_main_content')


<div class="box">
    <div class="box-header">
        <h1 class="box-title">Yearly Summery</h1><br>

        <form action="{{route('yearly.pdf')}}" method="post" style="float: right; margin-right: 3px;">
            @csrf

                <input type="hidden" name="from" value="{{ $from }}">
                <input type="hidden" name="to" value="{{ $to}}">
            <button type="submit" class="btn btn-info">Save as PDF</button>
        </form>
    </div>

<section class="content">
    <div class="row">
            <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

            @php $total_premium=$total_admin=$total_fine=$total_profit=$total_total_credit=$total_out_admin=$total_entertainment=$total_invetment_withdraw=$total_toatl_debit=0 @endphp

            <div class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table class="table table-bordered table-hover text-center" role="grid">
                    <thead>
                        <tr>
                            <!-- <th colspan="2"></th> -->
                            <th colspan="9"> Cash In</th>

                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Premium</th>
                            <th>Admin</th>
                            <th>Fine</th>
                            <th>Profit</th>
                            <th>Total Credit</th>



                        </tr>
                    </thead>
                    @if(count($cash_in_info) or count($cash_out_info) > 0)
                    <tbody>

                        @php $i=0 @endphp
                        @foreach($cash_in_info as  $info)

                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{ $info['month']}}</td>
                            <td>{{'20'.$info['year']}}</td>
                            <td><strong>{{ $info['premium']}}</strong></td>
                            <td><strong>{{ $info['admin'] }}</strong></td>
                            <td><strong>{{ $info['fine']}}</strong></td>
                            <td><strong>{{ $info['profit'] }}</strong></td>
                            <td><strong>{{ $info['total_credit'] }}</strong></td>
                            <tr>

                            @php $total_premium=$total_premium+$info['premium'];
                             $total_admin=$total_admin+ $info['admin'] ;
                              $total_fine=$total_fine+ $info['fine'];
                               $total_profit=$total_profit+  $info['profit'];
                                $total_total_credit=$total_total_credit+ $info['total_credit']
                             @endphp

                        @php $i++ @endphp
                        @endforeach
                        <tr>


                            <td colspan="3"><strong>Total :</strong></td>
                            <td><strong>{{  $total_premium}}</strong></td>
                            <td><strong>{{ $total_admin }}</strong></td>
                            <td><strong>{{ $total_fine}}</strong></td>
                            <td><strong>{{ $total_profit }}</strong></td>
                            <td><strong>{{  $total_total_credit }}</strong></td>

                         </tr>
                    </tbody>


                </table>
            </div>




                <div class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                    <table class="table table-bordered table-hover text-center" role="grid">
                        <thead>
                            <tr>
                                <!-- <th colspan="2"></th> -->
                                <th colspan="7"> Cash Out</th>

                            </tr>
                            <tr>

                                <th>#</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Admin</th>
                                <th>Entertainment</th>
                                <th>Investment withdraw</th>
                                <th>Total Debit</th>


                            </tr>
                        </thead>
                        <tbody>

                            @php $j=0 @endphp
                        @foreach($cash_out_info as  $info)

                        <td>{{$j+1}}</td>
                        <td>{{ $info['month']}}</td>
                        <td>{{'20'.$info['year']}}</td>
                        <td><strong>{{ $info['admin']}}</strong></td>
                        <td><strong>{{ $info['entertainment'] }}</strong></td>
                        <td><strong>{{ $info['investment_withdraw']}}</strong></td>
                        <td><strong>{{ $info['total_debit'] }}</strong></td>
                        </tr>
                        @php
                        $total_out_admin=$total_out_admin+ $info['admin'] ;
                         $total_entertainment=$total_entertainment+ $info['entertainment'];
                         $total_invetment_withdraw=$total_invetment_withdraw +  $info['investment_withdraw'];
                         $total_toatl_debit=$total_toatl_debit + $info['total_debit']
                        @endphp


                        @php $j++ @endphp
                        @endforeach
                        <tr>

                            <td colspan="3"><strong> Total: </strong>
                            <td><strong>{{  $total_out_admin }}</strong></td>
                            <td><strong>{{ $total_entertainment }}</strong></td>
                            <td><strong>{{   $total_invetment_withdraw}}</strong></td>
                            <td><strong>{{  $total_toatl_debit }}</strong></td>
                            </tr>
                        </tbody>


                    </table>
                </div>



            @else
            <h1 style="color: red;">No Data Found!</h1>
        @endif

        </div>
      </div>




</p>
</section>

</div>


@endsection
