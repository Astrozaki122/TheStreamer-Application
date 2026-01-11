<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <title>TheStreamer</title>  

 @vite('resources/css/app.css')
 <body class="text-center px8 py-12">
  <h1> Welcome to TheStreamer</h1>
  
  <nav class="nav-right">
    <a href="/login" class="btn"> Login</a>
    <a href="/register" class="btn mr-4"> Register</a>
    
  </nav>

  <p class = "px-4"> Upload and stream videos for free</p>  
 </body>
</html>
