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
@endsection