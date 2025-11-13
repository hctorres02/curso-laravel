<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\IndexRequest;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(IndexRequest $request)
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact(
            'user',
        ));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact(
            'user',
        ));
    }

    public function update(UpdateRequest $request, User $user)
    {
        return to_route('admin.users.edit', $user);
    }

    public function destroy(User $user)
    {
        return to_route('admin.users.edit', $user);
    }

    public function restore(User $user)
    {
        return to_route('admin.users.edit', $user);
    }

    public function forceDestroy(User $user)
    {
        return to_route('admin.users.index');
    }
}
