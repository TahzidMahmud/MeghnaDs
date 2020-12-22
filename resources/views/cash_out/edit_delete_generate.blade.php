@extends('layouts.master')
@section('page_main_content')
<script src="https://code.jquery.com/jquery-1.12.4.js"
 ></script>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">All Cash Out</h1>
        <br>
        <br>



    <!-- Search -->

<section class="content">
    <div class="row">
            <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body" >
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap table-responsive">
                <table id="example1" class="table table-bordered table-hover dataTable text-center" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Premium</th>
                            <th>Admistration</th>
                            <th>Entertainment</th>
                            <th>Investment Withdaw</th>

                            <th>Fine</th>
                            <th>Profit</th>
                            <th>Total Debit</th>
                            <th>Comments</th>
                            @if(Auth::user()->user_role == 1)
                            <th>Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                            <th>Delete <i class="fa fa-trash" aria-hidden="true"></i></th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=0 @endphp
                        @foreach($cash_out as $each)
                        <tr>

                            <td>{{ $i+1 }}</td>
                            {{-- {{ dd($each) }} --}}
                            @if( is_null($each->member_id))
                            <td>{{ "Others" }}</td>
                            @else
                            <td>{{ $each->member->name }}</td>
                            @endif

                            <td>{{ Carbon\Carbon::parse($each->date)->format('d-M-Y') }}</td>
                            <td>{{ $each->premium }}</td>
                            <td>{{ $each->admistration }}</td>
                            <td>{{ $each->entertainment}}</td>
                            <td>{{ $each->investment_withdraw  }}</td>
                            <td>{{ $each->fine }}</td>
                            <td>{{ $each->profit }}</td>
                            <td>{{ $each->total_debit }}</td>
                            <td>{{ $each->comments }}</td>
                            @if(Auth::user()->user_role == 1)
                                <td>

                                    <form  role="form" method="post" action="{{ route('cash_out.edit') }}">


                                            @csrf
                                            <input type="hidden" name="id" value="{{ $each->id }}" class="form-control">
                                            <input type="hidden" name="date" value="{{ $each->date }}" class="form-control">
                                            <input type="hidden" name="total_debit" value="{{ $each->total_debit }}" class="form-control">

                                        <button type="submit" class="btn btn-primary">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                    </td>
                                    <td>
                                    </form>
                                <a href="{{url('cash-out/delete/'.$each->id)}}"class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                @php $i++ @endphp
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
</section>

</div>



@endsection
