<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background-color: #c42b04 !important;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar"style="background-color: #c42b04 !important;" >
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background-color: #c42b04 !important;">

        <div class="pull-left " style="background-color: #c42b04 !important;">


            @if($active_users)

           @php $none='false'@endphp
           @foreach($active_users as $active)
                   @if($active->name == Auth::user()->name)

                   <img src="{{ url('storage/app/public/'.$active->photo) }}" class="img-square" style="height:60px;width:60px; margin-left:0px;" >
                   @else
                   @php $none='true'@endphp
                   @endif
           @endforeach


            @endif
            {{-- @if($none=='true')
                <img src="{{ asset('img/profile.png') }}" class="img-square"   style="height:60px;width:60px; margin-left:0px;" alt="User Image">
             @endif --}}

          {{-- <img class="img-square" src="{{ url('storage/app/public/'.Auth::user()->member->photo) }}" style="width: 70px; height:70px;" alt="member_image"> --}}
        </div>

        <div class="pull-left info " style="margin-left:10px;">
        <p >{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

         <ul class="sidebar-menu" data-widget="tree" style="background-color: #c42b04 !important;">
        <!--<li class="header">MAIN MENU</li>-->

        {{-- Dashboard --}}
        <li class="treeview" style="background-color: #c42b04 !important;">
          <li>
            <a href="{{ url('/dashboard') }}">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
        </li>
        {{-- Managing Committee --}}

            <li class="treeview" style="background-color: #c42b04 !important;">
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-gavel" aria-hidden="true"></i><i class="fa fa-users" aria-hidden="true"></i> <span>Managing Committee</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="background-color: #c42b04 !important;">
                    <li>
                        <a href="{{ route('director.index') }}"><i class="fa fa-circle-o"></i>Board Of Director</a>
                    </li>
                    <li>
                        <a href="{{ route('advisor.index') }}"><i class="fa fa-circle-o"></i>Board of Advisor</a>
                    </li>
                </ul>
            </li>






    {{-- Admin --}}
    @if(Auth::user()->user_role == 1)
    <li class="treeview" style="background-color: #c42b04 !important;">
        <a href="{{ route('user.index') }}">
            <i class="fa fa-user"></i> <span>Admin</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="background-color: #c42b04 !important;">
            <li>
                <a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i>Admin List</a>
            </li>
            <li>
                <a href="{{ route('user.create') }}"><i class="fa fa-circle-o"></i>Add Admin</a>
            </li>
        </ul>
    </li>
    @endif


     {{-- Notice --}}
     @if(Auth::user()->user_role == 1)
     <li class="treeview" style="background-color: #c42b04 !important;">
         <a href="{{ route('user.index') }}">
             <i class="fa fa-bullhorn"></i> <span>Notice</span>
             <span class="pull-right-container">
                 <i class="fa fa-angle-left pull-right"></i>
             </span>
         </a>
         <ul class="treeview-menu" style="background-color: #c42b04 !important;">

             <li>
                 <a href="{{ route('Notice.create') }}"><i class="fa fa-circle-o"></i>Add Notice</a>
             </li>

             <li>
              <a href="{{ route('Notice.show') }}"><i class="fa fa-circle-o"></i>Notice List</a>
          </li>
         </ul>
     </li>
     @endif

    {{-- Member --}}
    <li class="treeview" style="background-color: #c42b04 !important;">
        <a href="{{ route('member.index') }}">
            <i class="fa fa-users"></i> <span>Member</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="background-color: #c42b04 !important;" >
            <li>
                <a href="{{ route('member.index') }}"><i class="fa fa-circle-o"></i>Member List</a>
            </li>
            @if(Auth::user()->user_role == 1)
              <li>
                  <a href="{{ route('member.create') }}"><i class="fa fa-circle-o"></i>Add Member</a>
              </li>
            @endif
        </ul>
    </li>

    {{-- Cash In --}}
    <li class="treeview" style="background-color: #c42b04 !important;">
        <a href="{{ url('/cash-in') }}">
            <i class="fa fa-money"></i> <span>Cash In</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="background-color: #c42b04 !important;">
            <li>
                <a href="{{ url('/cash-in') }}"><i class="fa fa-circle-o"></i>All Cash In</a>
            </li>
            @if(Auth::user()->user_role == 1)
              <li>
                  <a href="{{ url('/cash-in/create') }}"><i class="fa fa-circle-o"></i>Add Cash In</a>
              </li>
            @endif
            @if(Auth::user()->user_role == 1)
            <li>
                <a href="{{ url('/cash-in/edit-delete') }}"><i class="fa fa-circle-o"></i>Edit/Delete Cash In</a>
            </li>
          @endif
        </ul>
    </li>

    {{-- Cash Out --}}
    <li class="treeview" style="background-color: #c42b04 !important;">
        <a href="{{ url('/cash-out') }}">
            <i class="fa fa-money"></i> <span>Cash Out</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="background-color: #c42b04 !important;">
            <li>
                <a href="{{ url('/cash-out') }}"><i class="fa fa-circle-o"></i>All Cash Out</a>
            </li>
            @if(Auth::user()->user_role == 1)
              <li>
                  <a href="{{ url('/cash-out/create') }}"><i class="fa fa-circle-o"></i>Add Cash Out</a>
              </li>
            @endif
            @if(Auth::user()->user_role == 1)
            <li>
                <a href="{{ url('/cash-out/edit-delete') }}"><i class="fa fa-circle-o"></i>Edit/Delete Cash Out</a>
            </li>
          @endif
        </ul>
    </li>

    {{-- Investments --}}
    <li class="treeview" style="background-color: #c42b04 !important;">
        <a href="{{ url('/investments') }}">
            <i class="fa fa-usd"></i> <span>Investment</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="background-color: #c42b04 !important;">
            <li>
                <a href="{{ url('/investments') }}"><i class="fa fa-circle-o"></i>All Investment</a>
            </li>
            @if(Auth::user()->user_role == 1)
              <li>
                  <a href="{{ url('/investments/create') }}"><i class="fa fa-circle-o"></i>Add Investment</a>
              </li>
            @endif
        </ul>
    </li>


    {{-- new option report --}}

    <li class="treeview" style="background-color: #c42b04 !important;">
        <a href="{{ url('/cash-out') }}">
            <i class="fa fa-line-chart"></i> <span>Reports</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="background-color: #c42b04 !important;">
            <li>
                <a href="{{ url('/reports/create') }}"><i class="fa fa-circle-o"></i>Monthly Report</a>
            </li>
              <li>
                  @php $curr_id=Auth::user()->id @endphp
                  <a  href="{{ url('/reports/member_search') }}"><i class="fa fa-circle-o"></i>Member Report</a>
              </li>
              <li>
                @php $curr_id=Auth::user()->id @endphp
                <a  href="{{ route('report.yearly') }}"><i class="fa fa-circle-o"></i>Yearly Report</a>
            </li>

        </ul>
    </li>

    {{-- Bank Balance --}}
    <li class="treeview" style="background-color: #c42b04 !important;">
      <li>
        <a href="{{ url('/bank-balance') }}">
          <i class="fa fa-line-chart"></i> <span>Bank Balance</span>
        </a>
      </li>
    </li>



    <!-- Others -->
    <li class="treeview" style="background-color: #c42b04 !important;">
        <a href="#">
            <i class="fa fa-sitemap" aria-hidden="true"></i><span>Others</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="background-color: #c42b04 !important;">
            <li>
                <a href="{{  route('others.number')}}"><i class="fa fa-address-book-o" aria-hidden="true"></i>Mobile Number List</a>
            </li>
              <li>

                  <a  href="{{  route('others.blood_group') }}"><i class="fa fa-heartbeat" aria-hidden="true"></i>Blood Group List</a>
              </li>
              <li>

                <a  href="{{ route('others.bday') }}"><i class="fa fa-gift" aria-hidden="true"></i>Birthday List</a>
            </li>

        </ul>
    </li>



     {{-- Android app --}}
     <li class="treeview" style="background-color: #c42b04 !important;">
        <li>
          <a href="{{ route("app.download") }}">
            <i class="fa fa-tablet" aria-hidden="true"></i> <span>Download Android-app</span>
          </a>
        </li>
      </li>

  </section>
    <!-- /.sidebar -->

  </aside>
