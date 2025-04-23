@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background-color: #890000; color: #fff; padding: 35px; margin: 20px auto; text-align: center; font-size: 24px; max-width: 35%; border-radius: 25px;">
        <p style="margin-top:-5px; margin-bottom: 10px;"><b>Subjects</b></p>
        <form action="{{ route('subjects.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="query" class="form-control" style="width: 300px; margin-bottom: 10px;" placeholder="Search for subjects..." required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-top: 10px;">Search</button>
                </div>
            </div>
        </form>

        @if($subjects->isEmpty())
            <p>No subjects found.</p>
        @else
            <div style="text-align: center; margin-top: 20px;">
                <table class="table table-striped" style="margin: 0 auto; border-collapse: separate; border-spacing: 10px;">
                    <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Slots Taken</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->enrollments->count() }}/{{ $subject->available_slots + $subject->enrollments->count() }}</td>
                                <td>
                                    @if(Auth::user()->role === 'student')
                                        <form action="{{ route('subjects.addToCart', $subject->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-top: 10px;">Add to Cart</button>
                                        </form>
                                    @elseif(Auth::user()->role === 'professor')
                                        <button type="button" class="btn btn-info" onclick="window.location.href='{{ route('subjects.show', $subject->id) }}'" style="background-color: #0E4424; color: #fff; padding: 10px 20px; border: none; border-radius: 10px; cursor: pointer; font-size: 15px; margin-top: 10px;">View Enrollments</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection