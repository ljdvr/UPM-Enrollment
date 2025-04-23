@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background-color: #890000; color: #fff; padding: 35px; margin: 20px auto; text-align: center; font-size: 24px; max-width: 35%; border-radius: 25px;">
        <p style="margin-top: -5px; margin-bottom: 10px;"><b>My Enrollments</b></p>
        
        @if($enrollments->isEmpty())
            <p>You are not enrolled in any subjects.</p>
        @else
            <div style="text-align: center; margin-top: 20px;">
                <table class="table table-striped" style="margin: 0 auto; border-collapse: separate; border-spacing: 10px;">
                    <thead>
                        <tr>
                            <th style="color: white; font-size: 20px;">Subject Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td style="color: white; text-align: center;">{{ $enrollment->subject->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection

<style>
    .custom-btn:hover {
        text-decoration: underline;
    }
</style>
