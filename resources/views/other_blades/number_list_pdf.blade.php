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
            border:1px solid black;
            /*margin-top:20px;*/
        }
        table.table-bordered > thead > tr > th{
            border:0.5px solid black;

            font-weight: normal !important;

        }
        table.table-bordered > tbody > tr {
            line-height: 5px !important;
             border:0.5px solid black;

        }
        table.table-bordered > tbody > tr > td{
            border:1px solid black;
              line-height: 5px !important;
           font-weight: normal !important;
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
            <h1 class="box-title text-center">MOBILE NUMBER LIST</h1>
            <h1 class="box-title text-center">MEGHNA </h1>
            <h1 class="box-title text-center">DEVELOPMENT </h1>
            <h1 class="box-title text-center">SOCIETY </h1>
            <h1 class="box-title text-center">RAMGOTI,LAKSMIPUR </h1>

              </div>

        <br>
        <br>
      </div>
      <div class="col-md-6">

          <img src="{{asset('logo.jpeg')}}" class=" water-mark" alt="" >
          {{-- style="width: 4%; margin-right: 20px; float: right; --}}
      </div>
  </div>
  <br>
  <table class="table  table-bordered text-center" style="margin: 0px !important; padding: 0px !important;">

    <thead>

        <tr>

            <th>Serial</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>Remarks</th>

        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp

        @foreach($active_users as $member)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $member->name }}</td>
             <td>{{ $member->phone }}</td>
                <td>{{ $member->remarks_number }}</td>
        </tr>
        @php $i++ @endphp
        @endforeach
    </tbody>

    </table>
    <br>


</div>


</body>



