@extends('layouts.admin')

@section('title', 'Categories')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Categories</h2>
        <a href="{{ route('admin.categories.create') }}">
            <i class="fas fa-plus-circle"></i>
            Create category
        </a>
    </nav>
    <x-form :model="$searchParams" x-data @submit.prevent="stripEmptyFields">
        <div class="grid">
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
            <x-table.th label="Created at" orderBy="created_at" />
        </x-slot>
        @forelse ($categories as $category)
            <tr>
                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}">
                        {{ $category->name }}
                    </a>
                    <br>
                    <small>{{ Str::plural('Post', $category->posts_count, true) }}</small>
                </td>
                <td>
                    {{ $category->created_at_date }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">There are no categories.</td>
            </tr>
        @endforelse
    </x-table>
    {{ $categories->appends($searchParams->all())->links('shared.pagination') }}
@endsection