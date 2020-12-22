@extends('layouts.app')

@section('content')
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>


<!-- new design-->
<div class="d-flex flex-row-reverse ">
    <span>
        <a href="{{url('/login')}}" class="btn btn-danger btn-lg m-3"> Log In  <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
    </span>
</div>
<div class=" container" >

<div style="max-height:30vh;" >



    <div class="row">
        @foreach($members as $member)
            @if(Carbon\Carbon::parse($member->dob)->format('m-d')== $date)
             <marquee direction = "up"><div class="birthday-card" style="background-color: aliceblue"><img class="row" src="{{ asset('bday.gif') }}"><div class="card-body">
                 <h1 class="text-center" style="color:rgb(255,0,255);">Happy Birthday </h1><br>
                 🎈🎁<h1 style="color:rgb(255,0,255);">To</h1>🎈🎁<br>
                 <h1 class="text-black text-center">{{ $member->name }}</h1>
                </div></marquee>
            @endif

        @endforeach
    </div>


    <div id="notice" class="card border-danger mb-3 card-responsive">
        <div class="card-header text-center bg-danger"><h2 class="text-white"><i class="fa fa-bullhorn" aria-hidden="true"></i>  NOTICE BOARD</h2></div>
        <div class="one-time">
        <div class="card-body text-black bg-success your-class">
            @foreach ($notices as $notice)

              <div class="card-body">
              <h4 class="text-black">Title: {{$notice->title}}</h4>
                <hr>
                <h5 class= "font-weight-bold"> Description:</h5>
              <h5 class="text-end">{{$notice->description}}</h5>

                    <blockquote class="blockquote mb-0">
                        <footer class="blockquote-footer text-white">Created At Date:<cite title="Source Title">{{$notice->created_at}}</cite></footer>
                    </blockquote>
                    <hr>

              </div>


            @endforeach
        </div>
        </div>



</div>



    </div>


<script type="text/javascript">
    $(document).ready(function(){
        $('.one-time').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
            });
    });
  </script>


@endsection
