<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>@yield('title', 'Laracast')</title>
      <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.css">
   </head>
   <body>

       <div class="container">
           @yield('content')
       </div>

   </body>
</html>
