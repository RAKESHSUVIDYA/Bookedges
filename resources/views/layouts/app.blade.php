<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta-tags')
    <title>{{is_null(setting('site.title'))?'': setting('site.title').'-'}}@yield('title')</title>
  
    <link rel="shortcut icon" type="image" href="{{is_null(setting('site.logo'))?'': Storage::url(setting('site.logo'))}}">
    
    @notifyCss
    
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!-- Bootstrap -->
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link href="{{asset('css/ace-responsive-menu.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
      <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <link href="{{asset('css/ace-responsive-menu.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
      <!-- datatable CSS -->
    <link type="text/css" href="/frontend/css/DataTables/css/jquery.dataTables.min.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @yield('css')
</head>

<body>
    @include('notify::messages')
    
    @include('partials.header')
    <main>
        
        
        
        @yield('content')
    
        
    </main>
    
    @include('partials.footer-menu')
    @notifyJs
    @yield('javascript')
</body>

</html>
 