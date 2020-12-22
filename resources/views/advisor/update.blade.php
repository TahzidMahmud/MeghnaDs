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
        <h1 class="box-title">Editing Board Member information :: {{ $D_member->name }}</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ route('advisor.update') }}">
						@csrf
						<div class="box-body">
                           {{ Debugbar::info($D_member) }}
                            <input type="hidden" name="member_id" value="{{ $D_member->member_id }}"  >
                            <input type="hidden" name="id" value="{{ $D_member->id }}"  >
                            <input type="hidden" name="name" value="{{ $D_member->name }}"  >

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="post">Post     :</label> </div>
								<div class="col-md-5">
									<input type="text" name="post" value="{{ $D_member->post}}" class="form-control" placeholder="Enter Post" required="">
								</div>
								<div class="col-md-3"></div>
							</div>



                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="motivation">Personal Motivation    :</label> </div>
								<div class="col-md-5">
									<input type="motivation" name="motivation" value="{{ $D_member->motivation }}" class="form-control" placeholder="Enter motivation" required="">
								</div>
								<div class="col-md-3"></div>
                            </div>


                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="from">From - Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="from" value="{{ $D_member->from}}" class="form-control" required>
								</div>
								<div class="col-md-3"></div>
                            </div>


                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="to">To - Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="to" value="{{ $D_member->to }}" class="form-control" required>
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
									<button type="submit" class="btn btn-success btn-block">Update</button>
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
