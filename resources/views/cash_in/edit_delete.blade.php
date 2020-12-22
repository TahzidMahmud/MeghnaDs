@extends('layouts.master')
@section('page_main_content')
<script src="https://code.jquery.com/jquery-1.12.4.js"
 ></script>


<div class="box">
    <div class="box-header">
        <h1 class="box-title">Select Cash In Date For Eid or Delete</h1>
        @if(session('msg'))
        <div class="alert alert-danger alert-dismissible notify">
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
        <br>
        <br>



    <!-- Search -->

   <form method="POST" action="{{ url('cash-in/edit-delete/generate') }}">
    @csrf


    <div class="row">

    <div class="col-sm-1"> From </div>
    <div class="col-sm-4">
         <!-- <label>From</label> -->
        <div data-provide="datepicker" class="input-group date">
            <input type="text" name="from_date" class="form-control" required="">
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>
    <div class="col-sm-1"> To
     </div>
     <div class="col-sm-4">
        <!--  <label>To</label> -->
        <div data-provide="datepicker" class="input-group date">
            <input type="text" name="to_date" class="form-control" required="">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
            </div>
        </div>
    </div>


</div>

    <br><br> <div class="row"><div class="col-md-4"></div> <div class="col-md-4"><button type="submit" class="btn btn-info " id="cashin">Generate Cash In</button></div> <div class="col-md-4"></div></div></form>

    </div>
</div>




@endsection
