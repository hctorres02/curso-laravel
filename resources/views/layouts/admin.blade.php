@extends('layouts.app')

@section('body')
    <header class="container" x-data>
        <h3><strong>A blog CMS</strong></h3>
        <x-nav class="h-scroll">
            <x-nav.a :href="route('admin.home')" :current="Route::is('admin.home')">Home</x-nav.a>
            <x-nav.a :href="route('home')">Blog</x-nav.a>
            <x-nav.separator />
            <x-nav.a :href="route('admin.categories.index')" :current="Route::is('admin.categories.*')">Categories</x-nav.a>
            <x-nav.a :href="route('admin.comments.index')" :current="Route::is('admin.comments.*')">Comments</x-nav.a>
            <x-nav.a :href="route('admin.medias.index')" :current="Route::is('admin.medias.*')">Medias</x-nav.a>
            <x-nav.a :href="route('admin.posts.index')" :current="Route::is('admin.posts.*')">Posts</x-nav.a>
            <x-nav.a :href="route('admin.users.index')" :current="Route::is('admin.users.*')">Users</x-nav.a>
            <x-nav.separator />
            <x-nav.a @click="ghostForm('{{ route('logout') }}')">Logout</x-nav.a>
        </x-nav>
    </header>
    <main class="container">
        @yield('main')
    </main>
@endsection