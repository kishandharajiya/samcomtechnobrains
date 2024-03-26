<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index(Request $request){

        if ($request->ajax()) {
            $user = User::where('role', 'supplier')->get();
            return DataTables::of($user)->addColumn('action', function ($user) {
                return '<a href="users/' . $user->id . '/edit" class="btn btn-primary">Edit</a>
                        <button class="btn" data-remote="/users/' . $user->id . '">Delete</button>';
            })
            ->rawColumns(['action'])->make(true);
        }

        return view('users.index');
    }
}
