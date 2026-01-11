<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
           <title>TheStreamer</title>
</head>
<body class="text-center px8 py-12">
<header>
    <h1>TheStreamer</h1>
    <nav>
    @auth
        <a href="/mainpage">main page</a>
        <a href="/video/upload">Upload Video</a>
        <form method="POST" action="/logout" style="display: inline; margin-left: auto;">
            @csrf
            <button type="submit" style="background:none;border:none;color:inherit;cursor:pointer;text-decoration:underline;">Logout</button>
        </form>
    @else
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    @endauth
    </nav>
</header>
<main>
    {{ $slot }}
</main>
</body>


</html></html>