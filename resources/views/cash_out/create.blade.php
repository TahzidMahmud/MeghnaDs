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
        <h1 class="box-title">Add Cash Out</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form role="form" method="post" action="{{ url('/cash-out/store') }}">
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


							<div class="form-group row members"  style="display: none;">
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

							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="date">Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="date" value="{{ old('date') }}" class="form-control" required>
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row others"  style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="admistration">Admistration :</label> </div>
								<div class="col-md-5">
									<input type="number" name="admistration" value="{{ old('admistration') }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row others" style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="entertainment">Entertainment :</label> </div>
								<div class="col-md-5">
									<input type="number" name="entertainment" value="{{ old('entertainment') }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row members"  style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="investment_withdraw">Investment Profit :</label> </div>
								<div class="col-md-5">
									<input type="number" name="investment_withdraw" value="{{ old('investment_withdraw')  }}" class="form-control" >
								</div>
								<div class="col-md-3"></div>
							</div>

							<div class="form-group row others"  style="display: none;">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="investment_withdraw">Purpose :</label> </div>
								<div class="col-md-5">
									<textarea name="purpose" class="form-control" placeholder="Enter Purpose" >{{ old('purpose') }}</textarea>
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
									<button type="submit" class="btn btn-success btn-block">Add Cash Out</button>
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
	        $(".members").show();
	        $(".others").hide();
	      }
	      else if( this.value == 'others')
	      {
	        $(".others").show();
	        $(".members").hide();

	      }
	      else {
	      	$(".others").hide();
	      	$(".members").hide();

	      }
	    });
	});
</script>

@endsection
