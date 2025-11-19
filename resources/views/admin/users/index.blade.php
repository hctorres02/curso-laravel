@extends('layouts.admin')

@section('title', 'Users')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Users</h2>
        <a href="{{ route('admin.users.create') }}">
            <i class="fas fa-plus-circle"></i>
            Create user
        </a>
    </nav>
    <x-form :model="$searchParams" x-data @submit.prevent="stripEmptyFields">
        <div class="grid grid-2-4">
            <x-select placeholder="Role" name="role" :options="$roles" />
            <div role="group">
                <x-input name="search" placeholder="Search" />
                <x-button type="submit" icon="search" />
            </div>
        </div>
        <x-input type="hidden" name="orderBy" />
        <x-input type="hidden" name="sort" />
    </x-form>
    <x-table :$searchParams>
        <x-slot name="thead">
            <x-table.th label="Name" orderBy="name" />
            <x-table.th label="Email" orderBy="email" />
            <x-table.th label="Created at" orderBy="created_at" />
        </x-slot>
        @forelse ($users as $user)
            <tr>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}">
                        {{ $user->name }}
                    </a>
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->created_at_date }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">There are no users.</td>
            </tr>
        @endforelse
    </x-table>
    {{ $users->appends($searchParams->all())->links('shared.pagination') }}
@endsection