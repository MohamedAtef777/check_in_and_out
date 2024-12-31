@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-black">Attendance Records</h1>

        <form action="{{ route('attendance.check_in') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-success">Check In</button>
        </form>

        <form action="{{ route('attendance.check_out') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn btn-danger">Check Out</button>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Check-In</th>
                <th>Check-Out</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->user->name }}</td>
                    <td>{{ $attendance->check_in }}</td>
                    <td>{{ $attendance->check_out }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="card">
            <div class="card-header">Attendance Summary</div>
            <div class="card-body">
                <p>Total Records: {{ $attendances->total() }}</p>
                <p>Current Page: {{ $attendances->currentPage() }}</p>
            </div>
        </div>

        <div style="margin-left: 600px">
            {{ $attendances->links() }}
        </div>
    </div>
@endsection
<style>
    /* General Container Styling */
    .container {
        text-align: center;
        color: #ffffff;
    }

    /* Table Styling */
    .table {
        margin: 20px auto;
        width: 80%;
        border-collapse: collapse;
        background: linear-gradient(145deg, #333333, #222222);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.6), inset 0 -1px 1px rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }

    .table th, .table td {
        padding: 15px;
        text-align: center;
        color: #cce7ff;
    }

    .table thead th {
        background: linear-gradient(145deg, #1e1e1e, #2a2a2a);
        color: #80bfff;
        font-weight: bold;
    }

    .table tbody tr:hover {
        background: linear-gradient(145deg, #222222, #3a3a3a);
        transform: translateY(-2px);
        transition: all 0.3s ease-in-out;
    }

    /* Card Styling */
    .card {
        display: inline-block;
        margin: 20px;
        width: 300px;
        background: linear-gradient(145deg, #333333, #444444);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3), inset 0 -1px 1px rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        color: #ffffff;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.5);
    }

    .card-header {
        background: linear-gradient(145deg, #1a1a1a, #2a2a2a);
        padding: 15px;
        font-weight: bold;
        color: #80bfff;
    }

    .card-body {
        padding: 20px;
        background: linear-gradient(145deg, #222222, #333333);
    }

    .btn {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .btn-success {
        background: linear-gradient(145deg, #007acc, #005f99);
        color: #ffffff;
    }

    .btn-success:hover {
        background: linear-gradient(145deg, #005f99, #007acc);
        transform: translateY(-3px);
    }

    .btn-danger {
        background: linear-gradient(145deg, #cc0000, #990000);
        color: #ffffff;
    }

    .btn-danger:hover {
        background: linear-gradient(145deg, #990000, #cc0000);
        transform: translateY(-3px);
    }
</style>
