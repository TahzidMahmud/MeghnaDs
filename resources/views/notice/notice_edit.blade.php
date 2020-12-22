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
        <h1 class="box-title">Edit Norice</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" id="notice" action="{{ route('Notice.store') }}">
						@csrf
						<div class="box-body">

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-1"> <label for="name">Title</label> </div>
								<div class="col-md-8">
									<input type="text" name="title" value="{{ $notice->title }}" class="form-control" placeholder="Enter Title" required>
								</div>
								<div class="col-md-1"></div>
							</div>
                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-1"> <label for="name">Description</label> </div>
								<div class="col-md-8">
									<textarea rows = "5" type="text" name="description" class="form-control" placeholder="Enter Description" required form="notice"> {{ $notice->description }}</textarea>
								</div>
								<div class="col-md-3"></div>
                            </div>
                            <div class="form-group row">
								<div class="col-md-4"></div>
                               <div class="col-md-4"> <button type="submit" class="btn btn-success btn-block">Submit Edit</button></div>
								<div class="col-md-4"></div>
							</div>

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
