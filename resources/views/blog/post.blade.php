@extends('layouts.blog')

@section('title', $post->title)

@section('main')
    @if ($post->cover)
        <header>
            <img src="{{ $post->cover->url }}" width="720" height="405">
        </header>
    @endif
    <hgroup>
        <h1>{{ $post->title }}</h1>
        <p>
            <a href="{{ route('blog.category', $post->category) }}">{{ $post->category->name }}</a>,
            {{ $post->created_at_relative }}
            &mdash; <a href="{{ route('home', ['author' => $post->author]) }}">{{ $post->author->name }}</a>
        </p>
    </hgroup>
    {!! $post->body_decoded !!}
@endsection