@extends('layouts.app')

@section('title', 'Login')

@section('body')
    <main class="container">
        <div class="grid grid-2-centered">
            <div  class="top-spaced bottom-spaced">
                <hgroup>
                    <h1>Welcome!</h1>
                    <p>Sign in to continue</p>
                </hgroup>
                <x-nav>
                    <x-nav.a :href="route('home')">Home</x-nav.a>
                </x-nav>
            </div>
            <x-form method="post" :action="route('login.store')">
                <x-input label="Email" name="email" type="email" required autofocus />
                <x-input label="Password" name="password" type="password" required />
                <x-button label="Sign in" icon="sign-in-alt" type="submit" />
            </x-form>
        </div>
    </main>
@endsection