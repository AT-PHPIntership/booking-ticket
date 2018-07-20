<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">
    <link rel="stylesheet" type="text/css" href="css/admin/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    @include('admin.layout.header')
    
    @include('admin.layout.sidebar')

    <main class="app-content">
      @yield('content')
    </main>
    <script src="js/admin/jquery-3.2.1.min.js"></script>
    <script src="js/admin/bootstrap.min.js"></script>
    @yield('script')
  </body>
</html>
