@extends('layouts.admin')

@section('title', 'Posts')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Posts</h2>
        <a href="{{ route('admin.posts.create') }}">
            <i class="fas fa-plus-circle"></i>
            Create post
        </a>
    </nav>
    <x-form :model="$searchParams" x-data @submit.prevent="stripEmptyFields">
        <div class="grid grid-4-2">
            <div class="grid">
                <x-select placeholder="Author" name="author_id" :options="$authors" />
                <x-select placeholder="Category" name="category_id" :options="$categories" />
                <x-select placeholder="Status" name="status" :options="$statuses" />
            </div>
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
            <x-table.th label="Title" orderBy="title" />
            <x-table.th label="Author" orderBy="author" />
            <x-table.th label="Status" orderBy="status" />
            <x-table.th label="Created at" orderBy="created_at" />
        </x-slot>
        @forelse ($posts as $post)
            <tr>
                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}">
                        {{ $post->title }}
                    </a>
                    <br>
                    <small>{{ $post->category->name }}</small>
                </td>
                <td>
                    {{ $post->author->name }}
                </td>
                <td>
                    {{ $post->status->label() }}
                </td>
                <td>
                    {{ $post->created_at_date }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">There are no posts.</td>
            </tr>
        @endforelse
    </x-table>
    {{ $posts->appends($searchParams->all())->links('shared.pagination') }}
@endsection