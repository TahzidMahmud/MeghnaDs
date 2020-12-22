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

        <form action="{{ route('others.bday_pdf')}}" method="post" style="float: right; margin-right: 3px;">
            @csrf

            <button type="submit" class="btn btn-info">Save as PDF</button>
        </form>

        <h1 class="box-title">Mobile Number List With Member credentials</h1>
    </div>

<section class="content">
    <div class="row">
            <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

            <div id="example1_wrapper" class="dataTables_wrapper table-responsive form-inline dt-bootstrap">
                <table id="example1" class="table table-bordered table-hover dataTable text-center" role="grid" aria-describedby="example1_info">
                    <thead>
                        <th colspan="9"> <h3>Name and Mobile Number </h3></th>
                        <tr>

                            <th>Serial</th>
                            <th>Name</th>
                            <th>Birth Day</th>
                            <th>Remarks</th>
                            @if(Auth::user()->user_role == 1)
                            <th colspan="3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit </th>
                            @endif
                        </tr>
                    </thead>



                 <tbody>
                    @php $i = 0 @endphp

                    @foreach($active_users as $member)
                    <tr>
                        <td>{{ $i+1 }}</td>

                        <td>{{ $member->name }}</td>
                         <td>{{Carbon\Carbon::parse( $member->dob)->format('d-M-Y') }}</td>

                            <td>{{ $member->remarks_birthday }}</td>
                        <td>
                            @if(Auth::user()->user_role == 1)
                            <form method="post" action="{{ route('others.bday_edit') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $member->id }}">
                                <input type="text" name="remarks" value="{{ old('remarks') }}">
                                <button href="" type="submit" class="btn btn-primary">Update <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button >
                            </form>
                            @endif

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
