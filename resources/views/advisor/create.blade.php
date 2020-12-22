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
        <h1 class="box-title">Add A Board Member</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ route('advisor.store') }}">
						@csrf
						<div class="box-body">

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="name">Select Member :</label> </div>
								<div class="col-md-5">
									<select name="member" class="form-control">
										<option value="">Select</option>
										@foreach($active_users as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>

										@endforeach
									</select>
                                </div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="post">Post     :</label> </div>
								<div class="col-md-5">
									<input type="text" name="post" value="{{ old('post') }}" class="form-control" placeholder="Enter Post" required="">
								</div>
								<div class="col-md-3"></div>
							</div>



                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="motivation">Personal Motivation    :</label> </div>
								<div class="col-md-5">
									<input type="motivation" name="motivation" value="{{ old('motivation') }}" class="form-control" placeholder="Enter motivation" required="">
								</div>
								<div class="col-md-3"></div>
                            </div>


                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="from">From - Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="from" value="{{ old('from') }}" class="form-control" required>
								</div>
								<div class="col-md-3"></div>
                            </div>


                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="to">To - Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="to" value="{{ old('to') }}" class="form-control" required>
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
									<button type="submit" class="btn btn-success btn-block">Create</button>
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
