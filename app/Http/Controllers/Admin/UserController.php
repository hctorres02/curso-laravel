<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
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

    public function update(Request $request, User $user)
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
