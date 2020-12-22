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
        <h1 class="box-title">Add Member</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="box-body">
							{{-- name --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="name" style="float: right;">Name :</label> </div>
								<div class="col-md-5">
									<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>
							
							{{-- email --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="email" style="float: right;">Email :</label> </div>
								<div class="col-md-5">
									<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required="">
								</div>
								<div class="col-md-3"></div>
							</div>
							
							{{-- password --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="password" style="float: right;">Password :</label> </div>
								<div class="col-md-5">
									<input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Password" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- gender --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="gender" style="float: right;">Gender :</label> </div>
								<div class="col-md-5">
									<select name="gender" class="form-control">
										<option value="	">Select</option>
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- DOB --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="dob" style="float: right;">Date of Birth :</label> </div>
								<div class="col-md-5">
									<input type="date" name="dob" value="{{ old('dob') }}" class="form-control" placeholder="Enter Date of Birth" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- father --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="father" style="float: right;">Father :</label> </div>
								<div class="col-md-5">
									<input type="text" name="father" value="{{ old('father') }}" class="form-control" placeholder="Enter father's name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- mother --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="mother" style="float: right;">Mother :</label> </div>
								<div class="col-md-5">
									<input type="text" name="mother" value="{{ old('mother') }}" class="form-control" placeholder="Enter mother's name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- NID --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="nid" style="float: right;">National ID Card(NID) :</label> </div>
								<div class="col-md-5">
									<input type="text" name="nid" value="{{ old('nid') }}" class="form-control" placeholder="Enter NID Number" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- phone --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="phone" style="float: right;">Phone Number :</label> </div>
								<div class="col-md-5">
									<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter Phone Number" required="">
								</div>
								<div class="col-md-3"></div>
							</div>
							
							{{-- present address --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="present_addr" style="float: right;">Present Address :</label> </div>
								<div class="col-md-5">
									<textarea name="present_addr" class="form-control" placeholder="Enter Present Address" required="">{{ old('present_addr') }}</textarea> 
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- permanent address --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="permanent_addr" style="float: right;">Permanent Address :</label> </div>
								<div class="col-md-5">
									<textarea name="permanent_addr" class="form-control" placeholder="Enter Permanent Address" required="">{{ old('permanent_addr') }}</textarea> 
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- spouse --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="spouse" style="float: right;">Nominee Name :</label> </div>
								<div class="col-md-5">
									<input type="text" name="spouse" value="{{ old('spouse') }}" class="form-control" placeholder="Enter Name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- spouse nid --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="spouse_nid" style="float: right;">Nominee NID :</label> </div>
								<div class="col-md-5">
									<input type="number" name="spouse_nid" class="form-control" value="{{ old('spouse_nid') }}" placeholder="Enter NID" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- spouse photo --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="spouse_photo" style="float: right;">Nominee Photo :</label> </div>
								<div class="col-md-5">
									<input type="file" name="spouse_photo" class="form-control custom-file-input">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- photo --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="photo" style="float: right;">Photo :</label> </div>
								<div class="col-md-5">
									<input type="file" name="photo" class="form-control custom-file-input">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- profession --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="profession" style="float: right;">Profession :</label> </div>
								<div class="col-md-5">
									<input type="text" name="profession" value="{{ old('profession') }}" class="form-control" placeholder="Enter profession " required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- Blood Group --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="blood_group" style="float: right;">Blood Group :</label> </div>
								<div class="col-md-5">
									<select name="blood_group" class="form-control" required>
										<option value=""></option>
										<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- joining date --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="joining_date" style="float: right;">Joining Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="joining_date" value="{{ old('joining_date') }}" class="form-control" placeholder="Enter Joining Date" required="">
								</div>
								<div class="col-md-3"></div>
							</div>


						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"></div>
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