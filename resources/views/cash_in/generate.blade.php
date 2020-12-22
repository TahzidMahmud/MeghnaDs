@extends('layouts.master')
@section('page_main_content')
<script src="https://code.jquery.com/jquery-1.12.4.js"
 ></script>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">All Cash In</h1>
        <br>
        <br>



    <!-- Search -->

   <form method="POST" action="{{ url('cash-in/generate') }}">
    @csrf


    <div class="row">

    <div class="col-sm-1"> From </div>
    <div class="col-sm-4">
         <!-- <label>From</label> -->
        <div data-provide="datepicker" class="input-group date">
            <input type="text" name="from_date" class="form-control" required="">
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
    <div class="col-sm-1"> To
     </div>
     <div class="col-sm-4">
        <!--  <label>To</label> -->
        <div data-provide="datepicker" class="input-group date">
            <input type="text" name="to_date" class="form-control" required="">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>


</div>

    <br><br> <div class="row"><div class="col-md-4"></div> <div class="col-md-4"><button type="submit" class="btn btn-info " id="cashin">Generate Cash In</button></div> <div class="col-md-4"></div></div></form>

    </div>

<section class="content">
    <div class="row">
            <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body" >
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table id="example1" class="table table-bordered table-hover dataTable text-center" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Premium</th>
                            <th>Admistration</th>
                            <th>Fine</th>
                            <th>Profit</th>
                            <th>Total Credit</th>
                            <th>Comments</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($cash_in as $each)
                        <tr>
                            <td>{{ $each->id }}</td>
                            <td>{{ $each->member->name }}</td>
                            <td>{{ Carbon\Carbon::parse($each->date)->format('d-M-Y') }}</td>
                            <td>{{ $each->premium }}</td>
                            <td>{{ $each->admistration }}</td>
                            <td>{{ $each->fine }}</td>
                            <td>{{ $each->profit }}</td>
                            <td>{{ $each->total_credit }}</td>
                            <td>{{ $each->comments }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
        </div>
</section>

</div>



@endsection
