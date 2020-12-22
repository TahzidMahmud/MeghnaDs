<header class="main-header " style="background-color: #05be15 !important;">
    <!-- Logo -->
    <a href="{{ url('/dashboard') }}" class="logo"style="background-color: #05be15;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size: 80% !important;" style="background-color: #05be15 !important;">Meghna Development Society</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="background-color: #05be15"><b>Meghna Development Society</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top"  style="background-color: #05be15 !important;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"style="background-color: #05be15 !important;" >Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class=" user user-menu">


             @if($active_users)

             @php $none='false'@endphp
             @foreach($active_users as $active)
                     @if($active->name == Auth::user()->name)


                      <img src="{{ url('storage/app/public/'.$active->photo)}}" class="img-square" style="height:60px;width:60px; margin-left:0px;" >
                     @else
                     @php $none='true'@endphp
                     @endif
             @endforeach


              @endif
              {{-- @if($none=='true')
              <img src="{{ asset('img/profile.png') }}" class="square"  style="height:60px;width:60px; margin-left:0px;" alt="User Image">
              @endif --}}

              <span class="hidden-xs " style="color: white !important">{{ Auth::user()->name }}</span>
            </a>
            {{-- <td>
              <img class="img-square" src="{{ url('storage/app/public/'.$member->photo) }}" style="width: 70px; height:70px;" alt="member_image">
          </td> --}}


          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <div >
              <a href="{{route('logout')}}" class="btn btn-danger " style="margin: 10px;background-color:#DC143C !important; color:white !important;"> Logout  <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
