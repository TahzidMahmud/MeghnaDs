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
        <h1 class="box-title">Directors List</h1>
    </div>

<section class="content">
    <div class="row">
            <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->

        <div class="box-header">


            <form action="{{ route('advisor.pdf') }}" method="post" style="float: right; margin-right: 3px;">
                @csrf
                <button type="submit" class="btn btn-info">Save as PDF</button>
            </form>
        </div>
        <div class="box-body">

            @if(Auth::user()->user_role == 1)
            <a  href="{{ route('advisor.create') }}" class="btn btn-success " style="float:right;"> Add New Board-member</a><br><br><br><br>
            @endif
            <div id="example1_wrapper" class="dataTables_wrapper table-responsive form-inline dt-bootstrap">
                <table id="example1" class="table table-bordered table-hover dataTable text-center" role="grid" aria-describedby="example1_info">
                    <thead>
                        <th colspan="9"> <h3>Board OF Advisors</h3></th>
                        <tr>

                            <th>Serial</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Post</th>

                            <th>Personal Mobile Number</th>

                            <th>From</th>
                            <th>To</th>

                            @if(Auth::user()->user_role == 1)
                            <th><i class="fa fa-trash" aria-hidden="true"></i>Delete</th>
                            <th><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</th>
                            @endif
                        </tr>
                    </thead>


                 {{Debugbar::info($board_members) }}
                 <tbody>
                    @php $i = 0 @endphp

                    @foreach($board_members as $member)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        @foreach ($active_users as $user)
                        @if($member->member_id == $user->id)
                        <td><img class="img-square" src="{{ url('storage/app/public/'.$user->photo) }}" style="width: 70px; height:70px;" alt="member_image"></td>
                        <td>{{ $member->name }}</td>



                 <td>{{ $member->post }}</td>
                        <td>{{ $user->phone }}</td>
                        @endif
                        @endforeach


                        <td>{{ Carbon\Carbon::parse($member->from)->format('Y-m-d') }}</td>
                        <td>{{ Carbon\Carbon::parse($member->to)->format('Y-m-d') }}</td>

                        @if(Auth::user()->user_role == 1)
                        <td>
                            <a href="{{ route('advisor.delete',$member->id) }}"  class="btn btn-danger"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </a >

                        </td>
                        <td>
                            <form method="post" action="{{ route('advisor.edit') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $member->id }}">
                                <button href="" type="submit" class="btn btn-primary">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button >
                            </form>


                        </td>
                        @endif
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
