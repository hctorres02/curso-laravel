@extends('layouts.app')

@push('head')
    <style>
        .container {
            max-width: 720px;
            padding-inline: calc(var(--pico-block-spacing-vertical) * 2);
        }
    </style>
@endpush

@section('body')
    <header class="container top-spaced">
        <hgroup>
            <h1>A blog CMS</h1>
            <p>Powered by Laravel</p>
        </hgroup>
        <x-nav class="h-scroll">
            <x-nav.a :href="route('home')">Home</x-nav.a>
            <x-nav.a x-data="{ open: false }" @click="open=true" :when="$shared_categories">
                Categories
                <x-dialog title="Categories">
                    <x-nav as-list>
                        @foreach ($shared_categories as $slug => $name)
                            <x-nav.a :href="route('blog.category', $slug)">{{ $name }}</x-nav.a>
                        @endforeach
                    </x-nav>
                </x-dialog>
            </x-nav.a>
            <x-nav.a :href="route('comments.index')">My Comments</x-nav.a>
            <x-nav.separator />
            <x-nav.a :href="route('admin.home')">Admin</x-nav.a>
        </x-nav>
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