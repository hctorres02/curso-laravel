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
            &mdash; {{ Str::plural('comment', $post->comments_count, true) }}
        </p>
    </hgroup>
    {!! $post->body_decoded !!}
    <section id="form-comment">
        <x-form method="post" :action="route('comments.store')">
            <x-input name="post_slug" type="hidden" :value="$post->slug" />
            <x-textarea label="Comment" name="body" rows="3" />
            <x-button label="Comment" icon="comment" type="submit" />
        </x-form>
    </section>
    <section id="comments">
        @forelse ($comments as $comment)
            <p>
                <strong>{{ $comment->author->name }}</strong>
                <br>
                {{ $comment->body }}
            </p>
            @if ($loop->last)
                {{ $comments->links('shared.pagination') }}
            @endif
        @empty
            <h6>There are no comments.</h6>
        @endforelse
    </section>
@endsection