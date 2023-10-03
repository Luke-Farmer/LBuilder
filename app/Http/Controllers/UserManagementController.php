<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        if (! Gate::allows('manage_users')) {
//            return redirect(route('manage users'));
//        }
        $users = User::all();
        $permissions = Permission::all();
        return view('users.index')
            ->withUsers($users)
            ->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserManagement $userManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
//        if (! Gate::allows('manage_users')) {
//            return redirect(route('manage users'));
//        }
        $user = User::where('id', '=', $id)->first();
        $permissions = Permission::all();
        return view('users.permissions')
            ->withProfile($user)
            ->withPermissions($permissions);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
//        if (! Gate::allows('manage_users')) {
//            return redirect(route('manage users'));
//        }
        foreach (Permission::all() as $permission) {
            if ( ! $request->has(str_replace(' ', '_', $permission->name))) {
                $user->revokePermissionTo($permission->name);
            } else {
                $user->givePermissionTo($permission->name);
            }
        }
        return redirect()
            ->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserManagement $userManagement)
    {
        //
    }

}
