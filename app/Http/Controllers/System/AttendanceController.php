<?php

namespace App\Http\Controllers\System;

use DataTables;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if (empty($request->from_date)) {
                $data = Attendance::with('users')->get();
            } else {
                $data = DB::table('attendances')
                    ->whereBetween('attended_at', [$request->from_date, $request->to_date])
                    ->get();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editData">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';
                    return $btn;
                })
                ->editColumn('attended_at', function ($data) {
                    return $data->attended_at->format('Y/m/d - H:i:s');
                })
                ->editColumn('returned_at', function ($data) {
                    return $data->returned_at->format('Y/m/d - H:i:s');
                })
                ->rawColumns(['action'])
                ->make('true');
        }
        return view('contents.attendances.index');
    }
}
