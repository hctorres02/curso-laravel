@extends('layouts.app')

@section('body')
    <header class="container" x-data>
        <h3><strong>A blog CMS</strong></h3>
    </header>
    <main class="container">
        @yield('main')
    </main>
@endsection