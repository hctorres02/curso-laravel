@extends('layouts.admin')

@section('title', 'Edit user')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Edit user</h2>
        <ul>
            @if ($user->deleted_at)
                <x-nav.a x-data @click="ghostForm('{{ route('admin.users.restore', $user) }}')">
                    <i class="fas fa-check-circle"></i>
                    Restore
                </x-nav.a>
                <x-nav.a x-data @click="ghostForm('{{ route('admin.users.force_destroy', $user) }}', 'delete')" style="color: var(--pico-del-color)">
                    <i class="fas fa-trash"></i>
                    Force delete
                </x-nav.a>
            @else
                <x-nav.a :href="route('admin.users.show', $user)" target="_blank">
                    <i class="fas fa-eye"></i>
                    Show
                </x-nav.a>
                <x-nav.a x-data @click="ghostForm('{{ route('admin.users.destroy', $user) }}', 'delete')" style="color: var(--pico-del-color)">
                    <i class="fas fa-trash"></i>
                    Delete
                </x-nav.a>
            @endif
        </ul>
    </nav>
    @if (! $user->deleted_at)
        <section class="grid grid-4-centered">
            <x-form method="put" :action="route('admin.users.update', $user)" :model="$user">
                @include('forms.user')
                <x-button label="Update" icon="save" type="submit" />
            </x-form>
        </section>
    @endif
@endsection