@extends('layouts.app')

@section('content')
<div class="container login">

    <div class="row justify-content-center" style="margin-top: 100px;">

        @if ($message = Session::get('message'))
        <div class="alert alert-info alert-block col-md-8"  style="text-align: center; background: rgb(255, 255, 255) none repeat scroll 0% 0%;  color: #000; background-color: #e2f0fb; border-color: #3490dc;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }} </strong>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card" style="background: transparent; border: none;">

                <div class="col-lg-6 m-auto ">
                    <div class="card mt-6 bg-dark" >
                        <div class="card-title text-center mt-3">
                            <img src="{{asset('logo.jpeg')}}" width="150px" height="150px" >
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-at fa-2x"></i>
                                        </span>

                                    </div>
                                    <input id="email" type="email" class="form-control py-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                  <!--   @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  -->
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock fa-2x"></i>

                                        </span>

                                    </div>
                                    <input id="password" type="password" class="form-control py-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                   <!--  @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror -->

                                </div>

                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    {{ __('Login') }}
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
