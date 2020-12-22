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
    <div class="box-header">
        <h1 class="box-title">Member List</h1>
    </div>

<section class="content">
    <div class="row">
            <div class="col-xs-12" >
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table id="example1" class="table table-bordered table-hover dataTable text-center" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Member From</th>
                            <th>Phone</th>
                            @if(Auth::user()->user_role == 1)
                                <th>Status</th>
                                <th>Change Password</th>
                                <th>Delete  <i class="fa fa-trash" aria-hidden="true"></i> </th>


                            @endif
                            <th>Action</th>


                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 0 @endphp

                        @foreach($members as $member)
                        <tr>
                        	<td>{{ $member->id }}</td>
                        	<td>
                                <img class="img-square" src="{{ url('storage/app/public/'.$member->photo) }}" style="width: 70px; height:70px;" alt="member_image">

                        	</td>
                        	<td>{{ $member->name }}</td>
                        	<td>{{ $member->user->email }}</td>
                        	<td>{{ Carbon\Carbon::parse($member->joining_date)->format('Y-m-d') }}</td>
                        	<td>{{ $member->phone }}</td>
                            @if(Auth::user()->user_role == 1)
                            	<td>
                            		{{ $member->user->status == 1 ? 'Active' : 'Inactive' }}
                            		<span>
                            			<a href="{{url('change-status/'.$member->user_id)}}" class="btn btn-warning btn-sm">Change</a>
                            		</span>
                            	</td>
                        	    <td>
                            		<form action="/change-pass" method="post" class="form-group">
                            			@csrf
                            			<input onmouseover="type = 'text'" onmouseout="type = 'password';" type="password" name="password" class="form-control input-sm showPass" required>
                            			<input type="hidden" name="id" value="{{$member->user->id}}">
                            			<button type="submit" class="btn btn-danger btn-sm">Change</button>
                            		</form>
                        	    </td>
                            @endif
                            <td>
                                @if(Auth::user()->user_role == 1)

                                <form method="post" action="{{ route('member.del') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $member->id }}">
                                <button  type="submit" class="btn btn-danger"> Delete </button>
                                </form>
                             @endif

                            </td>
                        	<td>
                                @if(Auth::user()->user_role == 1)
                                   <a href="{{ route('member.edit', $member->id) }}" title="Edit Profile">
                                        <i class="fa fa-pencil-square-o" style="font-size: 20px;"></i>
                                    </a> &nbsp; | &nbsp;
                                @endif

                                <a href="{{ route('member.show', $member->id) }}" title="View Profile">
                                    <i class="fa fa-user" style="font-size: 20px;"></i>
                                </a>

                        	</td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
        </div>
</section>

</div>

@endsection
