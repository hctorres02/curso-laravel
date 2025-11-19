@extends('layouts.admin')

@section('title', 'Edit post')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Edit post</h2>
        <ul>
            @if ($post->deleted_at)
                <x-nav.a x-data @click="ghostForm('{{ route('admin.posts.restore', $post) }}')">
                    <i class="fas fa-check-circle"></i>
                    Restore
                </x-nav.a>
                <x-nav.a x-data @click="ghostForm('{{ route('admin.posts.force_destroy', $post) }}', 'delete')" style="color: var(--pico-del-color)">
                    <i class="fas fa-trash"></i>
                    Force delete
                </x-nav.a>
            @else
                <x-nav.a :href="route('admin.posts.show', $post)" target="_blank">
                    <i class="fas fa-eye"></i>
                    Show
                </x-nav.a>
                <x-nav.a x-data @click="ghostForm('{{ route('admin.posts.destroy', $post) }}', 'delete')" style="color: var(--pico-del-color)">
                    <i class="fas fa-trash"></i>
                    Delete
                </x-nav.a>
            @endif
        </ul>
    </nav>
    @if (! $post->deleted_at)
        <section class="grid grid-4-centered">
            <x-form method="put" :action="route('admin.posts.update', $post)" :model="$post">
                @include('forms.post')
                <x-button label="Update" icon="save" type="submit" />
            </x-form>
        </section>
    @endif
@endsection