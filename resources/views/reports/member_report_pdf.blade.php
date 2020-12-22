<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" type="text/css" href="{{ public_path('css/bootstrap.min.css') }}">
    <style type="text/css" media="screen">
        body {
           background-color: #fff;
            margin: 0px !important;
            padding: 0px !important;
        }
        table.table-bordered{
            border:1px solid #222d32;
            /*margin-top:20px;*/
        }
        table.table-bordered > thead > tr > th{
            border:0.5px solid #222d32;
            line-height: 5px !important;
            font-size: 10px !important;
            font-weight: normal !important;

        }
        table.table-bordered > tbody > tr {
            line-height: 5px !important;

        }
        table.table-bordered > tbody > tr > td{
            border:1px solid #222d32;
            line-height: 5px !important;
            font-size: 8px !important;
        }
        .water-mark{
             display: flex;
             align-content: center;
            height: 500px;
            width: 500px;
            opacity: 0.2;
            margin-top: 30%;
            margin-left:20%;
            padding: auto;
            z-index: -2;

        }

    </style>
</head>
<body>

    @php
     $total_cash_in = $total_cash_out = 0;
    @endphp
    <div class="row" style="margin-bottom: -30px">

        <div class="col-md-6">
            <h1 class="box-title">Member Report</h1><br>
            <strong style="color: #999;">   From:        {{ Carbon\Carbon::parse($from)->format('d-M-Y') }}   <span style="margin-left: 100px"> To: {{ Carbon\Carbon::parse($to)->format('d-M-Y') }}</span></strong>
        <br>
      </div>
      <div class="col-md-6">

          <img src="{{asset('logo.jpeg')}}" class=" water-mark" alt="" >
          {{-- style="width: 4%; margin-right: 20px; float: right; --}}
      </div>
  </div>

  <h5 style="text-align: center;">{{ $name }}</h5>
  <table class="table  table-bordered text-center" style="margin: 0px !important; padding: 0px !important;">

        <thead>
            <tr>
                <!-- <th colspan="2"></th> -->
                <th colspan="9"> Cash In</th>

            </tr>
            <tr>

                <th>Serial</th>
                <th>Date</th>
                <th>Cash-In</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>

            @foreach($cash_in as $key => $in)
            <tr>
                <td>{{++$key}}</td>
                <td>{{ Carbon\Carbon::parse($in->date)->format('d-M-Y') }}</td>
                <td>{{ $in->total_credit }}</td>
                <td>{{ $in->comments}}</td>
            </tr>
            @php

            $total_cash_in += $in->total_credit;

            @endphp

            @endforeach



            <tr>
                <td colspan="9"><h5 class="text-end text-black"> <b>Total Cash-in :   </b><strong>{{ $total_cash_in }}</strong></h5></td>
            </tr>
        </tbody>


    </table>
    <br>
    <table class="table  table-bordered text-center" style="margin: 0px !important; padding: 0px !important;">

        <thead>
            <tr>
                <!-- <th colspan="2"></th> -->
                <th colspan="9"> Cash Out</th>

            </tr>
            <tr>

                <th>Serial</th>
                <th>Date</th>
                <th>Cash-In</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>

            @foreach($cash_out as $key => $out)
            <tr>
                <td>{{++$key}}</td>
                <td>{{ Carbon\Carbon::parse($out->date)->format('d-M-Y') }}</td>
                <td>{{ $out->total_debit }}</td>
                <td>{{ $out->comments}}</td>
            </tr>
            @php

            $total_cash_out += $out->total_debit;

            @endphp

            @endforeach



            <tr>
                <td colspan="9"><h5 class="text-end text-black"> <b>Total Cash-out :   </b><strong>{{ $total_cash_out }}</strong></h5></td>
            </tr>
        </tbody>


    </table>







</div>





</body>



