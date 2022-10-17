<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="_token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')Gentelella Alela! | </title>
    <style>
 
  
  </style>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="{{asset('admin/vendors/bootstrap/dist/css')}}/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/vendors/font-awesome/css')}}/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/vendors/nprogress')}}/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/vendors/iCheck/skins/flat')}}/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/vendors/bootstrap-progressbar/css')}}/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/vendors/jqvmap/dist')}}/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin/vendors/bootstrap-daterangepicker')}}/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin/build/css')}}/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/icons-1.8.1/font')}}/bootstrap-icons.css">
    <link href=" {{asset('admin')}}/dataTables.min.css"  rel="stylesheet" >
   
   
    
   
    
  

  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">




@include('dashboard.admin.inc.header') 
@include('dashboard.admin.inc.sidebar')
@yield('content')
@include('dashboard.admin.inc.footer')


<script src="{{asset('admin/vendors/jquery/dist')}}/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('admin/vendors/bootstrap/dist/js')}}/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="{{asset('admin/vendors/fastclick/lib')}}/fastclick.js"></script>
<!-- NProgress -->
<script src="{{asset('admin/vendors/nprogress')}}/nprogress.js"></script>
<!-- Chart.js -->
<script src="{{asset('admin/vendors/Chart.js/dist')}}/Chart.min.js"></script>
<!-- gauge.js -->
<script src="{{asset('admin/vendors/gauge.js/dist')}}/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('admin/vendors/bootstrap-progressbar')}}/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="{{asset('admin/vendors/iCheck')}}/icheck.min.js"></script>
<!-- Skycons -->
<script src="{{asset('admin/vendors/skycons')}}/skycons.js"></script>
<!-- Flot -->
<script src="{{asset('admin/vendors/Flot')}}/jquery.flot.js"></script>
<script src="{{asset('admin/vendors/Flot')}}/jquery.flot.pie.js"></script>
<script src="{{asset('admin/vendors/Flot')}}/jquery.flot.time.js"></script>
<script src="{{asset('admin/vendors/Flot')}}/jquery.flot.stack.js"></script>
<script src="{{asset('admin/vendors/Flot')}}/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="{{asset('admin/vendors/flot.orderbars/js')}}/jquery.flot.orderBars.js"></script>
<script src="{{asset('admin/vendors/flot-spline/js')}}/jquery.flot.spline.min.js"></script>
<script src="{{asset('admin/vendors/flot.curvedlines')}}/curvedLines.js"></script>
<!-- DateJS -->
<script src="{{asset('admin/vendors/DateJS/build')}}/date.js"></script>
<!-- JQVMap -->
<script src="{{asset('admin/vendors/jqvmap/dist')}}/jquery.vmap.js"></script>
<script src="{{asset('admin/vendors/jqvmap/dist/maps')}}/jquery.vmap.world.js"></script>
<script src="{{asset('admin/vendors/jqvmap/examples/js')}}/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('admin/vendors/moment/min')}}/moment.min.js"></script>
<script src="{{asset('admin/vendors/bootstrap-daterangepicker')}}/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('admin/build/js')}}/custom.min.js"></script>


<script src="{{asset('admin')}}/dataTables.min.js"></script>




   
 
 
@yield('scripts')

</body>
</html>