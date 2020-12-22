@extends('layouts.master')
@section('page_main_content')

@if ($errors->any())
	<div class="alert alert-danger alert-dismissible notify">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <h4><i class="icon fa fa-warning"></i>Error!</h4>
	    @foreach ($errors->all() as $error){{ $error }}@endforeach
	</div>
@endif

<div class="box">
    <div class="box-header" style="text-align: center;">
        <h1 class="box-title">Generate Member Wise Reports</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ route('member_report.show') }}">
						@csrf
						<div class="box-body">

							<div class="form-group row">
                                <div class="col-md-2"></div>
                                    @php
                                        $name_array=[];
                                        foreach ($members as $member) {
                                            array_push($name_array,"$member->name");
                                        }
                                    @endphp
								<div class="col-md-2"> <label for="member_name" style="float: right;">Select a Memeber :</label> </div>
								<div class="col-md-5">
									<select name="member_name" class="form-control">
										<option value="">Select</option>
                                        <?php

                                            $month = $name_array;

                                        ?>

										@for($i = 1; $i <= count($month); $i++)
										<option value="{{ $month[$i-1] }}">{{ $month[$i-1] }}</option>}
										option
										@endfor
                                    </select>
                                    <br>
                                    <br>





                                    <div class="row">

                                        <div class="col-sm-1"> From </div>
                                        <div class="col-sm-5">
                                             <!-- <label>From</label> -->
                                            <div data-provide="datepicker" class="input-group date">
                                                <input type="text" name="from_date" class="form-control" required="">
                                                <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"> To
                                         </div>
                                         <div class="col-sm-5">
                                            <!--  <label>To</label> -->
                                            <div data-provide="datepicker" class="input-group date">
                                                <input type="text" name="to_date" class="form-control" required="">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                        </div>








								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2">

								<div class="col-md-3"></div>
							</div>

						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<div class="form-group row">
								<div class="col-md-3"></div>
								<div class="col-md-1"></div>
								<div class="col-md-5">
									<button type="submit" class="btn btn-info btn-block">Generate</button>
								</div>
								<div class="col-md-3"></div>
							</div>
						</div>

				</form>
	       		</div>
	      	</div>

	    </div>
    </div>
</section>

</div>

@endsection
