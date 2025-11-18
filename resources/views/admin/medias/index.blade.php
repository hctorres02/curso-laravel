@extends('layouts.admin')

@section('title', 'Medias')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Medias</h2>
        <a href="{{ route('admin.medias.create') }}">
            <i class="fas fa-plus-circle"></i>
            Upload media
        </a>
    </nav>
    <x-form :model="$searchParams" x-data @submit.prevent="stripEmptyFields">
        <div class="grid grid-2-4">
            <x-select placeholder="Directory" name="directory" :options="$directories" />
            <div role="group">
                <x-input name="search" placeholder="Search" />
                <x-button type="submit" icon="search" />
            </div>
        </div>
        <x-input type="hidden" name="orderBy" />
        <x-input type="hidden" name="sort" />
    </x-form>
    <x-table :$searchParams>
        <x-slot name="thead">
            <x-table.th label="Name" orderBy="name" />
            <x-table.th label="Path" orderBy="path" />
            <x-table.th label="Uploaded at" orderBy="created_at" />
        </x-slot>
        @forelse ($medias as $media)
            <tr>
                <td>
                    <a href="{{ route('admin.medias.edit', $media) }}">
                        {{ $media->name }}
                    </a>
                </td>
                <td>
                    {{ $media->path }}
                </td>
                <td>
                    {{ $media->created_at_date }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">There are no medias.</td>
            </tr>
        @endforelse
    </x-table>
    {{ $medias->appends($searchParams->all())->links('shared.pagination') }}
@endsection