<!doctype html>
<html lang="en">

<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{!! asset('assets/css/bootstrap.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('assets/vendor/font-awesome/css/font-awesome.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('assets/vendor/linearicons/style.css') !!}">
  <!--text editor-->
  <script src="{!! asset('ckeditor/ckeditor.js') !!}"></script>
  <!-- MAIN CSS -->
   <link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="{!! asset('assets/css/demo.css') !!}">
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('waymaker/Waymaker1.png') !!}">
  <link rel="icon" type="image/png" sizes="96x96" href="{!! asset('waymaker/Waymaker1.png') !!}">
</head>

<body>
<div id="wrapper">
@include('navbar')
<div class="main">
@yield('content')

<script src="{!! asset('assets/vendor/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/vendor/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script src="{!! asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('assets/scripts/klorofil-common.js') !!}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
</body>
</html>

