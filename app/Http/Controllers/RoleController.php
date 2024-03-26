<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $role = Role::with('permissions')->get();
            return DataTables::of($role)
                ->addColumn('id',function($role){
                  return '<input type="checkbox" id="' . $role->id . '" class="manual_entry_cb" value="' . $role->id . '" name="id[]" />';
                })
                ->addColumn('permission_list', function ($role) {
                    $list = $role->permissions->where('permission', 'list')->first();
                    $status = $list ? $list->status : 0;
                    return '<input type="checkbox" name="list[]" id="' . $list->permission . '" class="manual_entry_cb" value="' . $status . '" ' . ($status ? 'checked' : '') . ' />';
                })
                ->addColumn('permission_create', function ($role) {
                    $list = $role->permissions->where('permission', 'create')->first();
                    $status = $list ? $list->status : 0;
                    return '<input type="checkbox" name="create[]" id="' . $list->permission . '" class="manual_entry_cb" value="' . $status . '" ' . ($status ? 'checked' : '') . ' />';
                })
                ->addColumn('permission_edit', function ($role) {
                    $list = $role->permissions->where('permission', 'edit')->first();
                    $status = $list ? $list->status : 0;
                    return '<input type="checkbox" name="edit[]" id="' . $list->permission . '" class="manual_entry_cb" value="' . $status . '" ' . ($status ? 'checked' : '') . ' />';
                })
                ->addColumn('permission_delete', function ($role) {
                    $list = $role->permissions->where('permission', 'delete')->first();
                    $status = $list ? $list->status : 0;
                    return '<input type="checkbox" name="delete[]" id="' . $list->permission . '" class="manual_entry_cb" value="' . $status . '" ' . ($status ? 'checked' : '') . ' />';
                })
                ->rawColumns(['id','permission_list', 'permission_create', 'permission_edit', 'permission_delete'])
                ->make(true);
        }

        return view('roles.index');
    }

    public function update(Request $request){
       
    }
}
