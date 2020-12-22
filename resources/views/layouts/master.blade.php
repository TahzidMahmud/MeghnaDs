<!DOCTYPE html>
<html>

  <head>
    @include('includes.html_head')
    @yield('style')
  {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  </head>


  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include ('includes.header')
        @include ('includes.main_menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 396px;">

            <section class="content">

                @yield('page_main_content')

            </section>

        </div>

        @include('includes.footer')


    </div>
        @include('includes.default_js')

        @yield('scripts')
  </body>

</html>
