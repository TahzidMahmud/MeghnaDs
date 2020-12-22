 @extends('layouts.master')
 @section('page_main_content')

 <div class="box">
    <div class="box-header">
        <h1 class="box-title">All Cash Out</h1>
        <br>
        <br>

        <!-- Search -->

        <form method="POST" action="{{ url('cash-out/generate') }}">
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

        <br><br> <div class="row"><div class="col-md-4"></div> <div class="col-md-4"><button type="submit" class="btn btn-info " id="cashin">Generate Cash Out</button></div> <div class="col-md-4"></div></div></form>

    </div>




    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                        <table id="example1" class="table table-bordered table-hover dataTable text-center" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Admistration</th>
                                    <th>Entertainment</th>
                                    <th>Investment Withdraw</th>
                                    <th>Purpose</th>
                                    <th>Total Debit</th>
                                </tr>
                            </thead>
                            @php $i = 0 @endphp
                            @foreach($cash_out as $each)
                            <tr>
                                <td>{{ $i+1 }}</td>
                             @if($each->member_id!==null)
                             <td>{{ $each->member->name }}</td>
                             @else
                             <td></td>
                             @endif
                             <td>{{ Carbon\Carbon::parse($each->date)->format('d-M-Y') }}</td>
                             <td>{{ $each->admistration }}</td>
                             <td>{{ $each->entertainment }}</td>
                             <td>{{ $each->investment_withdraw }}</td>
                             <td>{{ $each->purpose}}</td>
                             <td>{{ $each->total_debit }}</td>
                         </tr>
                         @php $i++ @endphp
                         @endforeach
                         <tbody>
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
