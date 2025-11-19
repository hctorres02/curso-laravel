@extends('layouts.admin')

@section('title', 'Update media')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Update media</h2>
        <ul>
            <x-nav.a :href="route('admin.media.show', $media)" target="_blank">
                <i class="fas fa-eye"></i>
                Show
            </x-nav.a>
            <x-nav.a x-data @click="ghostForm('{{ route('admin.media.destroy', $media) }}', 'delete')" style="color: var(--pico-del-color)">
                <i class="fas fa-trash"></i>
                Delete
            </x-nav.a>
        </ul>
    </nav>
    <section class="grid grid-4-centered">
        <x-form method="put" :action="route('admin.media.update', $media)" :model="$media">
            <input label="Name" name="name" required />
            <x-button label="Update" icon="upload" type="submit" />
        </x-form>
    </section>
@endsection