@extends('layouts.master')
@section('page_main_content')

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
    <div class="box-header">
        <h1 class="box-title">Edit Bank Balance</h1>
    </div>

	<section class="content">
		<div class="row">
		   <div class="col-md-12">
		   		<div class="box-body">
		   			<form action="{{ url('/bank-balance/update') }}" method="POST">
		   				@csrf

		   				<div class="form-group row">
		   					<div class="col-md-2"></div>
		   					<div class="col-md-2"> <label for="amount" style="float: right;">Select :</label> </div>
		   					<div class="col-md-5">
		   						<select name="amount_option" class="form-control">
		   							<option value="">Select</option>
		   							<option value="increment">Increment</option>
		   							<option value="decrement">Decrement</option>
		   						</select>
		   					</div>
		   					<div class="col-md-3"></div>
		   				</div>

		   				<div class="form-group row">
		   					<div class="col-md-2"></div>
		   					<div class="col-md-2"> <label for="amount" style="float: right;">Amount :</label> </div>
		   					<div class="col-md-5">
		   						<input type="number" name="amount" class="form-control" placeholder="Enter Amount" required="">
		   					</div>
		   					<div class="col-md-3"></div>
		   				</div>

		   				<div class="form-group row">
		   					<div class="col-md-2"></div>
		   					<div class="col-md-2"></div>
		   					<div class="col-md-5">
		   						<button type="submit" class="btn btn-danger btn-block">Update</button>
		   					</div>
		   					<div class="col-md-3"></div>
		   				</div>

		   			</form>
		   		</div>
		   </div>
		</div>
    </section>
</div>

@endsection