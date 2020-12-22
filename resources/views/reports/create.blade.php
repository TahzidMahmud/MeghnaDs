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
        <h1 class="box-title">Generate Reports</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ url('/reports') }}">
						@csrf
						<div class="box-body">

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="month" style="float: right;">Select a Month :</label> </div>
								<div class="col-md-5">
									<select name="month" class="form-control">
										<option value="">Select</option>
										<?php
											$month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
										?>
										@for($i = 1; $i <= count($month); $i++)
										<option value="{{ $i }}">{{ $month[$i-1] }}</option>}
										option
										@endfor
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="year" style="float: right;">Year :</label> </div>
								<div class="col-md-5">
									<input type="text" name="year" value="{{ old('year') }}" class="form-control" placeholder="Enter year" required="">
								</div>
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