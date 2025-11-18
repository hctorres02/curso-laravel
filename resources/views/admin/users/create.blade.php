@extends('layouts.admin')

@section('title', 'Create user')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Create user</h2>
    </nav>
    <section class="grid grid-4-centered">
        <x-form method="post" :action="route('admin.posts.store')">
            @include('forms.user')
            <div class="grid">
                <x-input label="Password" name="password" type="password" required />
                <x-input label="Password confirmation" name="password_confirmation" type="password" required />
            </div>
            <x-button label="Create" icon="save" type="submit" />
        </x-form>
    </section>
@endsection