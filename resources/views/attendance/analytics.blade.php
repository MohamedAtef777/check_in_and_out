@extends('layouts.app')

@section('content')
    <style>
        /* General Container Styling */
        .container {
            text-align: center;
            color: #ffffff;
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
    </style>

    <div class="container">
        <h1>Attendance Analytics</h1>

        <div class="card">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <p>{{ $totalUsers }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Users Checked In</div>
            <div class="card-body">
                <p>{{ $attendees }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Attendance Percentage</div>
            <div class="card-body">
                <p>{{ number_format($percentage, 2) }}%</p>
            </div>
        </div>
    </div>
@endsection

