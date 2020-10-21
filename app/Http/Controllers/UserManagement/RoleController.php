<?php

namespace App\Http\Controllers\UserManagement;

use Alert;
use DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $roles = Role::latest()->get();
        if (request()->ajax()) {
            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editRole">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteRole">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make('true');
        }
        return view('contents.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        Role::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name]
        );

        $success = alert()->success('Title', 'Lorem Lorem Lorem');
        return response()->json(['success' => $success]);
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        Alert::question('Question Title', 'Question Message');
        return response()->json(['success' => 'Role Deleted Successfully']);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }
}
