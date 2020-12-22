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
    <div class="box-header" style="text-align: center;" style="font-family: roboto slab;">
        <h1 class="box-title">Add Cash In</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ route('cash_in.update') }}">
						@csrf
						<div class="box-body">

							<div class="form-group row">
								<div class="col-md-2"></div>

								<div class="col-md-5">


										{{-- @foreach($members as $member)
										<option value="{{ $member->id }}">{{ $member->name }}</option>
										@endforeach --}}
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="date">Date :</label> </div>
								<div class="col-md-5">
                                    <input type="hidden" name="id" value="{{ $member->id }}">
                                    <input type="hidden" name="d_premium" value="{{ $member->premium }}">
									<input type="date" name="date" value="{{$member->date }}" class="form-control" required>
								</div>
								<div class="col-md-3"></div>
                            </div>
                            <div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="premium">Premium :</label> </div>
								<div class="col-md-5">
									<input type="number" name="premium" value="{{ $member->premium }}" class="form-control" required>
								</div>
								<div class="col-md-3"></div>
							</div>
                            @if ($member->member_id != 36)


							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="admistration">Admistration :</label> </div>
								<div class="col-md-5">
									<input type="number" name="admistration" value="{{ $member->admistration }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="fine">Fine :</label> </div>
								<div class="col-md-5">
									<input type="number" name="fine" value="{{ $member->fine }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>
                            @endif
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="profit">Profit :</label> </div>
								<div class="col-md-5">
									<input type="number" name="profit" value="{{ $member->profit }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="comments">Comments :</label> </div>
								<div class="col-md-5">
									<input type="text" name="comments" value="{{ $member->comments }}" class="form-control">
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
