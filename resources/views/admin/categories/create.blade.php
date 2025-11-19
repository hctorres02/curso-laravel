@extends('layouts.admin')

@section('title', 'Create category')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Create category</h2>
    </nav>
    <section class="grid grid-4-centered">
        <x-form method="post" :action="route('admin.categories.store')">
            @include('forms.category')
            <x-button label="Create" icon="save" type="submit" />
        </x-form>
    </section>
@endsection