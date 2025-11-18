@extends('layouts.blog')

@section('title', $category->name)

@section('main')
    <section class="bottom-spaced">
        <h3>{{ $category->name }}</h3>
        <p>{{ $category->description }}</p>
    </section>
    @include('blog.posts-preview')
@endsection