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
    <div class="box-header" style="text-align: center;">
        <h1 class="box-title">Add an Admin</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ route('user.store') }}">
						@csrf
						<div class="box-body">

							<div class="form-group row">
								<div class="col-md-3"></div>
								<div class="col-md-1"> <label for="name">Name</label> </div>
								<div class="col-md-5">
									<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-3"></div>
								<div class="col-md-1"> <label for="email">Email</label> </div>
								<div class="col-md-5">
									<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-3"></div>
								<div class="col-md-1"> <label for="password">Password</label> </div>
								<div class="col-md-5">
									<input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Password" required="">
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
									<button type="submit" class="btn btn-success btn-block">Submit</button>
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