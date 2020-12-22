@extends('layouts.app')

@section('content')

<!-- new design-->
<div class=" container" >


<div class=" card text-white bg-danger mb-3">


    <article class="card-body  ">
        <h2 class="card-title text-center mb-4 mt-1">Sign in</h2>
        <hr>
        @if ($message = Session::get('message'))
        <div class="alert alert-info alert-block col-md-8"  style="text-align: center; background: rgb(255, 255, 255) none repeat scroll 0% 0%;  color: #000; background-color: #e2f0fb; border-color: #3490dc;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card-title text-center mt-3">
            <img src="{{asset('logo.jpg')}}" width="150px" height="150px" style="border-radius:50%" >
        </div>


        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
             </div>
            <input name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"required autocomplete="email" autofocus  placeholder="Please Enter Your Email Address Here .." type="email">
        </div> <!-- input-group.// -->
        </div> <!-- form-group// -->
        <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
             </div>
            <input class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Pleasae Enter Your Password Here .." type="password" autofocus>
        </div> <!-- input-group.// -->
        </div> <!-- form-group// -->
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block btn-lg ">
                {{ __('Login') }}
            </button>
        </div> <!-- form-group// -->
        <p class="text-center text-warning">Forgot password?...!</p> <p class="text-center text-success">Kindly Contact The Authority </a></p>
        </form>
    </article>
</div> <!-- card.// -->


    </div>


@endsection
