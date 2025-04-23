@extends('layouts.app')

@section('content')
    @guest
        <div style="padding-top: 60px;">
        <div style="position: fixed; top: 0; left: 0; width: 100%; background-color: #890000; color: #fff; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center;">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3d/University_of_the_Philippines_Manila_Seal.svg/1200px-University_of_the_Philippines_Manila_Seal.svg.png" alt="UPM Logo" style="width: 50px; height: 50px; margin-right: 10px;">
                <div style="font-size: 24px; font-weight: bold;"><a href="{{ url('/') }}" style="text-decoration: none; color: inherit;">UPM ENROLLMENT SYSTEM</a></div>
            </div>
        </div>
        <div style="background-color: #890000; color: #fff; padding: 35px; margin: 20px auto; text-align: center; font-size: 24px; max-width: 40%;">
            WELCOME TO THE UPM ENROLLMENT SYSTEM
        </div>
        <div style="display: flex; justify-content: center;">
            <button onclick="window.location.href='{{ route('register') }}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px;">Register</button>
            <button onclick="window.location.href='{{ route('login')}}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; margin-left: 10px; font-size: 15px;">Login</button>
        </div>
    </div>
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
            <p>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #fff; text-decoration: none; cursor: pointer;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                    Logout
                </a>
            </p>
        </div>
    </div>
    @if(Auth::user()->role === 'student')
        <div style="background-color: #890000; color: #fff; padding: 40px; border-radius: 10px; max-width: 400px; margin: 0 auto; display: flex; flex-direction: column; align-items: center;">
            <p style= "font-size: 20px; margin-top: 5px;">{{ strtoupper(Auth::user()->role) }} DASHBOARD</p>
            <button onclick="window.location.href='{{ route('subjects.index') }}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-bottom: 10px;">View Subjects</button>
            <button onclick="window.location.href='{{ route('cart.index') }}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-bottom: 10px;">My Cart</button>
            <button onclick="window.location.href='{{ route('enrollments.index') }}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-bottom: 10px;">My Enrollments</button>
        </div>
        @elseif(Auth::user()->role === 'professor')
        <div style="background-color: #890000; color: #fff; padding: 40px; border-radius: 10px; max-width: 400px; margin: 0 auto; display: flex; flex-direction: column; align-items: center;">
            <p style= "font-size: 20px; margin-top: 5px;">{{strtoupper(Auth::user()->role) }} DASHBOARD</p>
            <button onclick="window.location.href='{{ route('subjects.create') }}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-bottom: 10px;">Add Subject</button>
            <button onclick="window.location.href='{{ route('subjects.index') }}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-bottom: 10px;">View Subjects</button>
        </div>            
        @endif
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</div>
@endsection
