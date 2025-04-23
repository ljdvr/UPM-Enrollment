@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background-color: #890000; color: #fff; padding: 35px; margin: 20px auto; text-align: center; font-size: 24px; max-width: 35%; border-radius: 25px;">
        <p style="margin-top: -5px; margin-bottom: 10px;"><b>My Cart</b></p>
        
        @if(session('cart') && count(session('cart')) > 0)
            <div style="text-align: center; margin-top: 20px;">
                <table class="table table-striped" style="margin: 0 auto; border-collapse: separate; border-spacing: 10px;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Available Slots</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $details)
                            <tr>
                                <td>{{ $details['name'] }}</td>
                                <td>{{ $details['available_slots'] }}</td>
                                <td>
                                    <form action="{{ route('subjects.removeFromCart', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" style="text-decoration: underline; background-color: #890000; color: #27D46D; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-top: 10px;">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form action="{{ route('cart.checkout') }}" method="POST" style="text-align: center; margin-top: 20px;">
                @csrf
                <button type="submit" class="btn btn-success" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-top: 10px;">Checkout</button>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</div>
@endsection
