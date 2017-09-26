@extends('layouts.admin.app-admin')

@section('src-css')
  @parent
  <!-- NProgress -->
  <link href="{{ asset('/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('/gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{ asset('/gentelella/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="{{ asset('/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('src-js')
  @parent
  <!-- NProgress -->
  <script src="{{ asset('/gentelella/vendors/nprogress/nprogress.js') }}"></script>
  <!-- Chart.js -->
  <script src="{{ asset('/gentelella/vendors/Chart.js/dist/Chart.min.js') }}"></script>
  <!-- gauge.js -->
  <script src="{{ asset('/gentelella/vendors/gauge.js/dist/gauge.min.js') }}"></script>
  <!-- iCheck -->
  <script src="{{ asset('/gentelella/vendors/iCheck/icheck.min.js') }}"></script>
  <!-- Skycons -->
  <script src="{{ asset('/gentelella/vendors/skycons/skycons.js') }}"></script>
  <!-- Flot -->
  <script src="{{ asset('/gentelella/vendors/Flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/Flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/Flot/jquery.flot.time.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/Flot/jquery.flot.stack.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/Flot/jquery.flot.resize.js') }}"></script>
  <!-- Flot plugins -->
  <script src="{{ asset('/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/flot.curvedlines/curvedLines.js') }}"></script>
  <!-- DateJS -->
  <script src="{{ asset('/gentelella/vendors/DateJS/build/date.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('/gentelella/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{ asset('/gentelella/vendors/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endsection

@section('conteudo')
  @include('admin.includes.content-page-main')
@endsection
