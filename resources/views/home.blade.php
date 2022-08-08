<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['public/css/bootstrap.min.css', 'public/adminLTE/plugins/fontawesome-free/css/all.min.css'])
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
    <title>MyStore</title>
  </head>
  <body>
    <div id="app"></div>
    @vite('resources/js/app.js')
    @vite('public/js/bootstrap.min.js')
  </body>
</html>
