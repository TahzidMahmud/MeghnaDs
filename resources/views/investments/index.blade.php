@extends('layouts.master')
@section('page_main_content')
<style type="text/css" media="screen">
.dataTables_filter{ float: right !important; }
.fit_in{overflow:hidden;}
</style>
<div class="box">
    <div class="box-header">
        <h1 class="box-title">All Investments</h1>
    </div>

<section class="content">
    <div class="row">
            <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="row">
        		<div class="col-md-4"></div>
        		<div class="col-md-4" style="text-align: center;"><legend>Cash Out</legend></div>
        		<div class="col-md-4"></div>
        	</div>
            <div id="example1_wrapper" class=" dataTables_wrapper table-responsive form-inline dt-bootstrap">
                <table id="example1" class=" table table-bordered table-hover dataTable text-center" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Details</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($investment_out as $each)
                        <tr>
                            <td>{{ $each->id }}</td>
                            <td>{{ Carbon\Carbon::parse($each->date)->toDateString() }}</td>
                            <td>{{ $each->purpose }}</td>
                            <td>{{ $each->details }}</td>
                            <td>{{ $each->amount }}</td>
                            <td>{{ $each->status == 1 ? 'Running' : 'Closed' }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
			<hr>
            <div class="row">
            	<div class="col-md-4"></div>
            	<div class="col-md-4" style="text-align: center;"><legend>Cash In</legend></div>
            	<div class="col-md-4"></div>
            </div>

            <div id="example2_wrapper" class=" fit_in dataTables_wrapper form-inline dt-bootstrap">
                <table id="example2" class="table table-bordered fit_in table-hover dataTable text-center" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Details</th>
                            <th>Amount</th>
                        </tr>
                    </thead>

                    <tbody >
                        @foreach($investment_in as $each1)
                        <tr>
                            <td>{{ $each1->id }}</td>
                            <td>{{ Carbon\Carbon::parse($each1->date)->toDateString() }}</td>
                            <td>{{ $each1->purpose }}</td>
                            <td>{{ $each1->details }}</td>
                            <td>{{ $each1->amount }}</td>
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
