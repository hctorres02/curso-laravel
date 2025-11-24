<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserPermission;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\IndexRequest;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(IndexRequest $request)
    {
        $roles = UserRole::toArray();
        $searchParams = $request->validated();
        $users = User::searchable($searchParams)->paginate();

        return view('admin.users.index', compact(
            'roles',
            'searchParams',
            'users',
        ));
    }

    public function create()
    {
        $permissions = UserPermission::toArray();
        $roles = UserRole::toArray();

        return view('admin.users.create', compact(
            'permissions',
            'roles',
        ));
    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
        $user = User::create($attributes);

        return to_route('admin.users.edit', $user);
    }

    public function show(User $user)
    {
        return to_route('admin.users.edit', $user);
    }

    public function edit(User $user)
    {
        $permissions = UserPermission::toArray();
        $roles = UserRole::toArray();

        return view('admin.users.edit', compact(
            'permissions',
            'roles',
            'user',
        ));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $attributes = $request->validated();
        $user->update($attributes);

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
