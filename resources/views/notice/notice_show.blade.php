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
        <h1 class="box-title">Notice List</h1>
    </div>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
	    	<div class="box">
	       		<div class="box-body">

                        <div class="row">
                                <div class="col-xs-12" >
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div id="example1_wrapper" class="dataTables_wrapper table-responsive">
                                                <table id="example1" class="table table-bordered table-hover  text-center" role="grid">
                                                    <thead>
                                                        <tr>


                                                            <th>Title</th>
                                                            <th>Description</th>
                                                            @if(Auth::user()->user_role == 1)
                                                                <th>Edit</th>
                                                                <th>Delete</th>
                                                            @endif

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($notices as $notice)


                                                        <tr>
                                                            <td>{{$notice->title }}</td>
                                                            <td>
                                                                {{$notice->description }}
                                                            </td>
                                                            @if(Auth::user()->user_role == 1)
                                                                <td>
                                                                    <a  class="btn btn-primary" href="{{url('/notice/edit/'.$notice->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                                </td>
                                                                <td>

                                                                    <a  class="btn btn-danger" href="{{url('/notice/delete/'.$notice->id)}}" class="btn btn-warning btn-sm">Delete</a>
                                                                </td>
                                                            @endif

                                                        </tr>

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


	       		</div>
	      	</div>

	    </div>
    </div>
</section>

</div>

@endsection
