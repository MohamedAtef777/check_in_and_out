@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Attendance Reports</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Check-In</th>
                <th>Check-Out</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->check_in }}</td>
                    <td>{{ $report->check_out }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
