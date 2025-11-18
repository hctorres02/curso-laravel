@extends('layouts.admin')

@section('title', 'Create post')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Create post</h2>
    </nav>
    <section class="grid grid-4-centered">
        <x-form method="post" :action="route('admin.posts.store')">
            @include('forms.post')
            <x-button label="Create" icon="save" type="submit" />
        </x-form>
    </section>
@endsection