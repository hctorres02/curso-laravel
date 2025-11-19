@extends('layouts.blog')

@section('title', 'My Comments')

@section('main')
    @forelse ($comments as $comment)
        <blockquote>
            <strong>
                {{ $comment->created_at_date }} ::
                <a href="{{ route('blog.post', [$comment->post->category, $comment->post]) }}" target="_blank">
                    {{ $comment->post->title }}
                </a>
            </strong>
            <p>{{ $comment->body }}</p>
            <br>
            <a href="#" x-data @click.prevent="ghostForm('{{ route('admin.comments.destroy', $comment) }}', 'delete')" role="button" class="contrast">
                <i class="fas fa-trash"></i>
                <span>Delete<span>
            </a>
        </blockquote>
    @empty
        <h6>There are no comments.</h6>
    @endforelse
    {{ $comments->links('shared.pagination') }}
@endsection