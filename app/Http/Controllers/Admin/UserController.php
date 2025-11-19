<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $roles = UserRole::toArray();
        $searchParams = collect();
        $users = [];
    }

    public function create()
    {
        $permissions = UserPermission::toArray();
        $roles = UserRole::toArray();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $permissions = UserPermission::toArray();
        $roles = UserRole::toArray();
    }

    public function update(Request $request, User $user)
    {
        return back();
    }

    public function destroy(User $user)
    {
        return back();
    }

    public function forceDestroy(User $user)
    {
        return to_route('admin.users.index');
    }

    public function restore(User $user)
    {
        return back();
    }
}
