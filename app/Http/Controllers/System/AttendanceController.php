<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $attendances = Attendance::with('users')->orderBy('attended_at', 'DESC')->paginate(5);
        return view('contents.attendances.index', compact('attendances'))
            ->with('no', ($request->input('page', 1) - 1) * 10);
    }
}
