<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Enrollment System')</title>
    <!-- Using Vite -->
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Enrollment System</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @guest
                @else
                    <div style="padding-top: 60px;">
                        <div style="position: fixed; top: 0; left: 0; width: 100%; background-color: #890000; color: #fff; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center;">
                            <div style="display: flex; align-items: center; justify-content: space-between;">
                                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3d/University_of_the_Philippines_Manila_Seal.svg/1200px-University_of_the_Philippines_Manila_Seal.svg.png" alt="UPM Logo" style="width: 50px; height: 50px; margin-right: 10px;">
                                    <div style="font-size: 24px; font-weight: bold;"><a href="{{ url('/') }}" style="text-decoration: none; color: inherit;">UPM ENROLLMENT SYSTEM</a></div>
                            </div>
                            <div style="display: flex; align-items: center; margin-right: 50px;">
                                <p style="margin-right: 10px;">Welcome, {{ Auth::user()->name }}</p>
                                <p style="margin-right: 10px;">|</p>
                                <p><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #fff; text-decoration: none; cursor: pointer;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Logout</a></p>
                            </div>
                        </div>
                    @if(Auth::user()->role === 'student')
                    @elseif(Auth::user()->role === 'professor')
                    @endif
                @endguest
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
    </form>
    <!-- Using Vite -->
    @vite('resources/js/app.js')
</body>
</html>
