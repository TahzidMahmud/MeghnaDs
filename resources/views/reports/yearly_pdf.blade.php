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
            <h1 class="box-title">Yearly Report</h1><br>

        <br>
      </div>
      <div class="col-md-6">

          <img src="{{asset('logo.jpeg')}}" class=" water-mark" alt="" >
          {{-- style="width: 4%; margin-right: 20px; float: right; --}}
      </div>
  </div>
<br>
<br><br><br><br><br>
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
            @php $i++ @endphp
            @endforeach
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
            @php $j++ @endphp
            @endforeach
            </tbody>


        </table>
    </div>
    @else
    <h1 style="color: red;">No Data Found!</h1>
@endif

</body>



