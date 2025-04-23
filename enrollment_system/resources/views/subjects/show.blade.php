@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background-color: #890000; color: #fff; padding: 35px; margin: 20px auto; text-align: center; font-size: 24px; max-width: 35%; border-radius: 25px;">
        <p style="margin-top: -5px; margin-bottom: 10px;"><b>{{ $subject->name }}</b></p>
        <p>Slots Taken: {{ $subject->enrollments->count() }}/{{ $subject->available_slots + $subject->enrollments->count() }}</p>

        <h4>Enrolled Students</h4>
        @if($subject->enrollments->isEmpty())
            <p>No students are currently enrolled in this subject.</p>
            @if(session('cart') && count(session('cart')) > 0)
                <form action="{{ route('cart.checkout') }}" method="POST" style="text-align: center; margin-top: 20px;">
                    @csrf
                    <button type="submit" class="btn btn-success" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-top: 10px;">Checkout</button>
                </form>
            @else
            @endif
        @else
            <ul>
                @foreach ($subject->enrollments as $enrollment)
                    {{ $enrollment->user->name }}
                        <form action="{{ route('subjects.removeStudent', ['subject_id' => $subject->id, 'enrollment_id' => $enrollment->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger" style="text-decoration: underline; background-color: #890000; color: #27D46D; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-top: 10px;">Remove</button>
                        </form>
                    
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
