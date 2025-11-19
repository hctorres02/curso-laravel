@extends('layouts.admin')

@section('title', 'Edit category')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Edit category</h2>
        <ul>
            @if ($category->deleted_at)
                <x-nav.a x-data @click="ghostForm('{{ route('admin.categories.restore', $category) }}')">
                    <i class="fas fa-check-circle"></i>
                    Restore
                </x-nav.a>
                <x-nav.a x-data @click="ghostForm('{{ route('admin.categories.force_destroy', $category) }}', 'delete')" style="color: var(--pico-del-color)">
                    <i class="fas fa-trash"></i>
                    Force delete
                </x-nav.a>
            @else
                <x-nav.a :href="route('admin.categories.show', $category)" target="_blank">
                    <i class="fas fa-eye"></i>
                    Show
                </x-nav.a>
                <x-nav.a x-data @click="ghostForm('{{ route('admin.categories.destroy', $category) }}', 'delete')" style="color: var(--pico-del-color)">
                    <i class="fas fa-trash"></i>
                    Delete
                </x-nav.a>
            @endif
        </ul>
    </nav>
    @if (! $category->deleted_at)
        <section class="grid grid-4-centered">
            <x-form method="put" :action="route('admin.categories.update', $category)" :model="$category">
                @include('forms.category')
                <x-button label="Update" icon="save" type="submit" />
            </x-form>
        </section>
    @endif
@endsection