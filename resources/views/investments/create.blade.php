@extends('layouts.master')
@section('page_main_content')
<script src="https://code.jquery.com/jquery-1.12.4.js" 
integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

@if(session('msg'))
        <div class="alert alert-success alert-dismissible notify">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>Success!</h4>
            {{ session('msg') }}
        </div>
@endif
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible notify">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <h4><i class="icon fa fa-warning"></i>Error!</h4>
	    @foreach ($errors->all() as $error){{ $error }}@endforeach
	</div>
@endif

<div class="box">
    <div class="box-header" style="text-align: center;">
        <h1 class="box-title">Add Investment</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ url('/investments/store') }}">
						@csrf
						<div class="box-body">

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="purpose">Select Purpose :</label> </div>
								<div class="col-md-5">
									<select id="purpose" name="purpose" class="form-control">
										<option value="" selected="selected">Select</option>
										<option value="cash_in">Cash In</option>
										<option value="cash_out">Cash Out</option>
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>
							
							<div class="form-group row" id="cash_in" style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="investment_field2">Select a Field :</label> </div>
								<div class="col-md-5">
									<select name="investment_field2" class="form-control">
										<option value="">Select</option>
										@foreach($investments as $investment)
										<option value="{{ $investment->id }}">{{ $investment->id }}. {{ $investment->details }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3">
									<input type="checkbox" value="0" name="close_investment[]">&nbsp; Is this Investment Close today?
								</div>
							</div>


							<div class="form-group row" id="cash_out" style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="investment_field">Investment Field :</label> </div>
								<div class="col-md-5">
									<textarea name="investment_field" class="form-control"></textarea>
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="amount">Amount :</label> </div>
								<div class="col-md-5">
									<input type="number" name="amount" class="form-control" required>
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
									<button type="submit" class="btn btn-success btn-block">Add Investment</button>
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

<script type="text/javascript">
	$(document).ready(function(){
	    $('#purpose').on('change', function() {
	      if ( this.value == 'cash_in')
	      {
	        $("#cash_in").show();
	        $("#cash_out").hide();
	      }
	      else if( this.value == 'cash_out')
	      {
	        $("#cash_out").show();
	        $("#cash_in").hide();
	      }
	      else {
	      	$("#cash_in").hide();
	      	$("#cash_out").hide();
	      }
	    });
	});
</script>

@endsection