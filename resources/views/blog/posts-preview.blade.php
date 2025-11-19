@forelse ($posts as $post)
    <article class="bottom-spaced">
        @if ($post->cover)
            <header>
                <img src="{{ $post->cover->url }}" width="720" height="405">
            </header>
        @endif
        <hgroup>
            <h2>
                <a href="{{ route('blog.post', [$post->category, $post]) }}">{{ $post->title }}</a>
            </h2>
            <p>
                <a href="{{ route('blog.category', $post->category) }}">{{ $post->category->name }}</a>,
                {{ $post->created_at_relative }}
                &mdash; {{ Str::plural('comment', $post->comments_count, true) }}
            </p>
        </hgroup>
        @if ($post->headline)
            <p>{{ $post->headline }}</p>
        @endif
    </article>
    @if ($loop->last)
        {{ $posts->links('shared.pagination') }}
    @endif
@empty
    <h6>There are no posts.</h6>
@endforelse