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
        <h1 class="box-title">Edit Cash Out Selected Entry</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ route('cash_out.update') }}">
						@csrf
						<div class="box-body">


							<div class="form-group row">
								<div class="col-md-2"></div>


								<div class="col-md-3"></div>
							</div>


							<div class="form-group row members"  style="display: none;">
								<div class="col-md-2"></div>

								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="date">Date :</label> </div>
								<div class="col-md-5">
                                    <input type="date" name="date" value="{{ $member->date }}" class="form-control" required>
                                    <input type="hidden" name="id" value="{{ $id }}">

								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row others"  >
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="admistration">Admistration :</label> </div>
								<div class="col-md-5">
									<input type="number" name="admistration" value="{{ $member->admistration }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row others" >
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="entertainment">Entertainment :</label> </div>
								<div class="col-md-5">
									<input type="number" name="entertainment" value="{{ $member->entertainment}}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row members"  >
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="investment_withdraw">Investment Profit :</label> </div>
								<div class="col-md-5">
									<input type="number" name="investment_withdraw" value="{{$member->investment_withdraw  }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row others"  >
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="investment_withdraw">Purpose :</label> </div>
								<div class="col-md-5">
									<textarea name="purpose" class="form-control" placeholder="Enter Purpose" >{{ $member->purpose}}</textarea>
								</div>
								<div class="col-md-3"></div>
							</div>

							<!-- <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="others">Others :</label> </div>
								<div class="col-md-5">
									<input type="number" name="others" value="{{ old('others') }}" class="form-control" required>
								</div>
								<div class="col-md-3"></div>
							</div> -->

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
