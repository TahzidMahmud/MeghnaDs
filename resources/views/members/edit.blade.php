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
        <h1 class="box-title">Update Member</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">
					<form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<input type="hidden" name="user_id" value="{{ $member->user_id }}">
						<div class="box-body">
							{{-- name --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="name" style="float: right;">Name :</label> </div>
								<div class="col-md-5">
									<input type="text" name="name" value="{{ $member->name }}" class="form-control" placeholder="Enter Name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>
							
							{{-- email --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="email" style="float: right;">Email :</label> </div>
								<div class="col-md-5">
									<input type="email" name="email" value="{{ $member->user->email }}" class="form-control" placeholder="Enter Email" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- gender --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="gender" style="float: right;">Select :</label> </div>
								<div class="col-md-5">
									<select name="gender" class="form-control">
										<option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male</option>
										<option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>Female</option>
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- DOB --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="dob" style="float: right;">Date of Birth :</label> </div>
								<div class="col-md-5">
									<input type="date" name="dob" value="{{ $member->dob }}" class="form-control" placeholder="Enter Date of Birth" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- father --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="father" style="float: right;">Father :</label> </div>
								<div class="col-md-5">
									<input type="text" name="father" value="{{ $member->father }}" class="form-control" placeholder="Enter father's name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- mother --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="mother" style="float: right;">Mother :</label> </div>
								<div class="col-md-5">
									<input type="text" name="mother" value="{{ $member->mother }}" class="form-control" placeholder="Enter mother's name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- NID --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="nid" style="float: right;">National ID Card(NID) :</label> </div>
								<div class="col-md-5">
									<input type="text" name="nid" value="{{ $member->nid }}" class="form-control" placeholder="Enter NID Number" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- phone --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="phone" style="float: right;">Phone Number :</label> </div>
								<div class="col-md-5">
									<input type="text" name="phone" value="{{ $member->phone }}" class="form-control" placeholder="Enter Phone Number" required="">
								</div>
								<div class="col-md-3"></div>
							</div>
							
							{{-- present address --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="present_addr" style="float: right;">Present Address :</label> </div>
								<div class="col-md-5">
									<textarea name="present_addr" class="form-control" placeholder="Enter Present Address" required="">{{ $member->present_addr }}</textarea> 
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- permanent address --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="permanent_addr" style="float: right;">Permanent Address :</label> </div>
								<div class="col-md-5">
									<textarea name="permanent_addr" class="form-control" placeholder="Enter Permanent Address" required="">{{ $member->permanent_addr }}</textarea> 
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- spouse --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="spouse" style="float: right;">Nominee Name :</label> </div>
								<div class="col-md-5">
									<input type="text" name="spouse" value="{{ $member->spouse }}" class="form-control" placeholder="Enter Name" required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- spouse nid --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="spouse" style="float: right;">Nominee NID :</label> </div>
								<div class="col-md-5">
									<input type="number" name="spouse_nid" value="{{ $member->spouse_nid }}" class="form-control" placeholder="Enter NID" required="">
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
									<input type="text" name="profession" value="{{ $member->profession }}" class="form-control" placeholder="Enter profession " required="">
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- Blood Group --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="blood_group" style="float: right;">Blood Group :</label> </div>
								<div class="col-md-5">
									<select name="blood_group" class="form-control">
										<option value="A+" {{ $member->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
										<option value="A-" {{ $member->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
										<option value="B+" {{ $member->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
										<option value="B-" {{ $member->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
										<option value="AB+" {{ $member->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
										<option value="AB-" {{ $member->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
										<option value="O+" {{ $member->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
										<option value="O-" {{ $member->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
									</select>
								</div>
								<div class="col-md-3"></div>
							</div>

							{{-- joining date --}}
							<div class="form-group row">
								<div class="col-md-2"></div>
								<div class="col-md-2"> <label for="joining_date" style="float: right;">Joining Date :</label> </div>
								<div class="col-md-5">
									<input type="date" name="joining_date" value="{{$member->joining_date}}" class="form-control" placeholder="Enter Joining Date" required="">
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