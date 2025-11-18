@extends('layouts.admin')

@section('title', "User: {$user->name}")

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>User: {{ $user->name }}</h2>
    </nav>
@endsection