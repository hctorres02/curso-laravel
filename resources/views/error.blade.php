@extends('layouts.app')

@section('title', $message)

@section('body')
    <main class="container">
        <div class="grid grid-2-centered">
            <div  class="top-spaced bottom-spaced">
                <hgroup>
                    <h1>{{ $message }}</h1>
                    <p>{{ $status }}</p>
                </hgroup>
                <x-nav>
                    <x-nav.a :href="route('home')">Home</x-nav.a>
                </x-nav>
            </div>
        </div>
    </main>
@endsection