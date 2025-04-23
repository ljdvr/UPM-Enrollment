@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background-color: #890000; color: #fff; padding: 35px; margin: 20px auto; text-align: center; font-size: 24px; max-width: 35%; border-radius: 25px;">
        <p style="margin-top: -5px; margin-bottom: 50px; font-size: 24px;">Add Subject</p>
        <form action="{{ route('subjects.store') }}" method="POST" style="max-width: 80%; margin: 0 auto;">
            @csrf
            <div style="position: relative; margin-bottom: 35px;">
                <label for="name" style="position: absolute; top: -20px; background-color: #890000; padding: 0 5px; font-size: 18px; color: #fff;">Subject Name</label>
                <input type="text" class="form-control" id="name" name="name" required style="padding-top: 10px; width: 100%; max-width: 390px;"/>
            </div>
            <div style="position: relative; margin-bottom: 35px;">
                <label for="available_slots" style="position: absolute; top: -20px; background-color: #890000; padding: 0 5px; font-size: 18px; color: #fff;">Available Slots</label>
                <input type="text" class="form-control" id="available_slots" name="available_slots" required style="padding-top: 10px; width: 100%; max-width: 390px;"/>
            </div>
            <button type="submit" class="btn btn-primary custom-btn" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px;">Add Subject</button>
        </form>
    </div>
</div>
@endsection