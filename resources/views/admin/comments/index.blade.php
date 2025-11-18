@extends('layouts.admin')

@use(App\Enums\CommentStatus)

@section('title', 'Comments')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Comments</h2>
    </nav>
    @forelse ($comments as $comment)
        <blockquote>
            <strong>{{ $comment->created_at_date }} :: {{ $comment->post->title }}</strong>
            <p>{{ $comment->body }}</p>
            <footer>
                <cite>
                    &mdash; {{ $comment->author->name }} ({{ $comment->author->email }})
                </cite>
            </footer>
            <br>
            @if ($comment->status == CommentStatus::Pending)
                <a href="#" x-data @click.prevent="ghostForm('{{ route('admin.comments.approve', $comment) }}')" role="button">
                    <i class="fas fa-check-circle"></i>
                    <span>Approve</span>
                </a>
            @endif
            <a href="#" x-data @click.prevent="ghostForm('{{ route('admin.comments.destroy', $comment) }}', 'delete')" role="button" class="contrast">
                <i class="fas fa-trash"></i>
                <span>Delete</span>
            </a>
        </blockquote>
    @empty
        <h6>There are no comments.</h6>
    @endforelse
@endsection