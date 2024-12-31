<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->latest()->paginate(10);
        return view('attendance.index', compact('attendances'));
    }
    //check in
    public function checkIn(Request $request)
    {
        $request->validate
        ([
            'user_id'=>'required|exists:users,id',
        ]);
        Attendance::create
        ([
            'user_id'=>$request->user_id,
            'check_in'=>now(),

        ]);
        return redirect()->back()->with('success','check in successfully');
    }
    //check out
    public function checkOut(Request $request)
    {
        $request->validate
        ([
           'user_id'=>'required|exists:users,id',
        ]);
        $attendance=Attendance::where('user_id',$request->user_id)->whereNull('check_out')->firstOrFail();
        $this->update
        ([
            'check_out' => now()
        ]);
        return redirect()->back()->with('success','check out successfully');
    }
    public function reports()
    {
        $reports = Attendance::with('user')->get();
        return view('attendance.report',compact('reports'));
    }
    public function analytics()
    {
        $totalUsers = User::count();
        $attendees = Attendance::distinct('user_id')->count('user_id');
        $percentage = $totalUsers > 0 ? ($attendees / $totalUsers) * 100 : 0;

        return view('attendance.analytics', compact('percentage', 'totalUsers', 'attendees'));
    }

    private function update(array $array)
    {
    }

}
