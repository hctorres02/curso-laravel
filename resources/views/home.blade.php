<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', config('app.locale')) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Home page</title>
    </head>

    <body>
        <header class="container container-narrow top-spaced">
            <hgroup>
                <h1>A blog CMS</h1>
                <p>Powered by Laravel</p>
            </hgroup>
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    @if ($categories)
                        <li x-data="{ open: false }">
                            <a href="#" @click="open=true">Categories</a>
                            <template x-teleport="body">
                                <dialog open x-show="open">
                                    <article @click.outside="open=false">
                                        <header>
                                            <h3>Categories</h3>
                                            <button rel="prev" @click="open=false"></button>
                                        </header>
                                        <nav>
                                            <aside>
                                                <ul>
                                                    @foreach ($categories as $slug => $name)
                                                        <li>
                                                            <a href="{{ route('blog.category', $slug) }}">{{ $name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </aside>
                                        </nav>
                                    </article>
                                </dialog>
                            </template>
                        </li>
                    @endif
                </ul>
            </nav>
        </header>
        <main class="container container-narrow">
            @forelse ($posts as $post)
                <article @class(['bottom-spaced' => ! $loop->last])>
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
                            &mdash; <a href="{{ route('home', ['author' => $post->author]) }}">{{ $post->author->name }}</a>
                        </p>
                    </hgroup>
                    @if ($post->headline)
                        <p>{{ $post->headline }}</p>
                    @endif
                </article>
            @empty
                <h6>There are no posts.</h6>
            @endforelse
        </main>
        <footer class="container container-narrow">
            <p>
                <small>
                    Styled with <a href="https://picocss.com" target="_blank">Pico CSS</a>.
                </small>
            </p>
        </footer>
    </body>

</html>