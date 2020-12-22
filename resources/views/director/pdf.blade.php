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

    <div class="row" style="margin-bottom: -30px">

        <div class="col-md-6">
            <h1 class="box-title text-center"><u>Board OF Directors</u></h1>
            <h1 class="box-title text-center"><u>MEGHNA DEVELOPMENT SOCIETY </u></h1>

            <h1 class="box-title text-center"><u>RAMGOTI,LAKSMIPUR</u> </h1>

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
            <th>Photo</th>
            <th>Name</th>
            <th>Post</th>
            <th>Personal Mmobile Number</th>
            <th>From</th>
            <th>To</th>

        </tr>
    </thead>
    <tbody>
        @php $i = 0 @endphp

        @foreach($board_members as $member)
        <tr>
            <td>{{ $i+1 }}</td>
            @foreach ($active_users as $user)
            @if($member->member_id == $user->id)
            <td><img class="img-square" src="{{ url('storage/app/public/'.$user->photo) }}" style="width: 70px; height:70px;" alt="member_image"></td>
            <td>{{ $user->phone }}</td>
            @endif
            @endforeach
            <td>{{ $member->post }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ Carbon\Carbon::parse($member->from)->format('Y-m-d') }}</td>
            <td>{{ Carbon\Carbon::parse($member->to)->format('Y-m-d') }}</td>
        </tr>
        @php $i++ @endphp
        @endforeach
    </tbody>

    <div class="col-md-6">

          <img src="{{asset('logo.jpeg')}}" class=" water-mark" alt="" >
          {{-- style="width: 4%; margin-right: 20px; float: right; --}}
      </div>

    </table>
    <br>


</div>


</body>



