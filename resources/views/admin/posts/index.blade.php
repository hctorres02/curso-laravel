@extends('layouts.admin')

@section('title', 'Posts')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Posts</h2>
        <a href="{{ route('admin.posts.create') }}">
            <i class="fas fa-plus-circle"></i>
            Create post
        </a>
    </nav>
@endsection