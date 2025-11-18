@extends('layouts.app')

@section('body')
    <header class="container top-spaced">
        <hgroup>
            <h1>A blog CMS</h1>
            <p>Powered by Laravel</p>
        </hgroup>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                @if ($shared_categories)
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
                                                @foreach ($shared_categories as $slug => $name)
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
    <main class="container">
        @yield('main')
    </main>
    <footer class="container">
        <p>
            <small>
                Styled with <a href="https://picocss.com" target="_blank">Pico CSS</a>.
            </small>
        </p>
    </footer>
@endsection