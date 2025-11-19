@extends('layouts.admin')

@section('title', 'Categories')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Categories</h2>
        <a href="{{ route('admin.categories.create') }}">
            <i class="fas fa-plus-circle"></i>
            Create category
        </a>
    </nav>
@endsection