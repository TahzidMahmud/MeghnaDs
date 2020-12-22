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
    <div class="box-header" style="text-align: center;" style="font-family: roboto slab;">
        <h1 class="box-title">Add Cash In</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ url('/cash-in/store') }}">
						@csrf
						<div class="box-body">



							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="name">Select :</label> </div>
								<div class="col-md-5">
									<select id="select" name="member" class="form-control">
										<option value="">Select</option>
										<option value="members">Members</option>
										<option value="others">Others</option>

									</select>
								</div>
								<div class="col-md-3"></div>
							</div>


							<div class="form-group row mem" style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="name">Select Member :</label> </div>
								<div class="col-md-5">
									<select name="member" class="form-control">
										<option value="">Select</option>
										@foreach($members as $member)
										<option value="{{ $member->id }}">{{ $member->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>
							<div class="form-group row others "  style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="source">Source :</label> </div>
								<div class="col-md-5">
									<input type="text" name="source" value="{{ old('source') }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>


							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="date">Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="date" value="{{ old('date') }}" class="form-control" required>
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row  mem " style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="premium">Premium :</label> </div>
								<div class="col-md-5">
									<input type="number" name="premium" value="{{ old('premium') }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row mem " style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="admistration">Admistration :</label> </div>
								<div class="col-md-5">
									<input type="number" name="admistration" value="{{ old('admistration') }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row mem "  style="display:none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="fine">Fine :</label> </div>
								<div class="col-md-5">
									<input type="number" name="fine" value="{{ old('fine') }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row others "  style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="profit">Profit :</label> </div>
								<div class="col-md-5">
									<input type="number" name="profit" value="{{ old('profit') }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="comments">Comments :</label> </div>
								<div class="col-md-5">
									<input type="text" name="comments" value="{{ old('comments') }}" class="form-control">
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
									<button type="submit" class="btn btn-success btn-block">Add Cash In</button>
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
	    $('#select').on('change', function() {
	      if ( this.value == 'members')
	      {
              console.log("working");
	        $(".mem").show();
	        $(".others").hide();
	      }
	      else if( this.value == 'others')
	      {
	        $(".others").show();
	        $(".mem").hide();

	      }
	      else {
	      	$(".others").hide();
	      	$(".mem").hide();

	      }
	    });
	});
</script>


@endsection
