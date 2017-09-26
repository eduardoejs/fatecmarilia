<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap -->
    <link href="{{ asset('/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    @yield('src-css')
    <!-- Custom Theme Style -->
    <link href="{{ asset('/gentelella/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class='fa fa-mortar-board'></i> <span>{{ config('app.name', 'Laravel') }}</span></a>
            </div>

            <div class="clearfix"></div>

            @include('admin.includes.profile_quick_info')

            <br />

            @include('admin.includes.sidebar-menu')

            @include('admin.includes.menu-footer-buttons')
          </div>
        </div>

        @include('admin.includes.top-nav')

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('conteudo')
        </div>
        <!-- /page content -->

        @include('admin.includes.footer')
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('/gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>

    <!-- bootstrap-progressbar -->
    <script src="{{ asset('/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    @yield('src-js')
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('/gentelella/build/js/custom.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>
