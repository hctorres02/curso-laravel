@extends('layouts.admin')

@section('title', 'Overview')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Overview</h2>
    </nav>
    <section class="grid" style="grid-row-gap: var(--pico-grid-row-gap);">
        <article style="display: flex; justify-content: space-between;">
            <hgroup style="margin-bottom: 0;">
                <h1>{{ $countCategories }}</h1>
                <p>Categories</p>
            </hgroup>
            <h1 style="--pico-color: var(--pico-muted-color)">
                <i class="fas fa-cubes"></i>
            </h1>
        </article>
        <article style="display: flex; justify-content: space-between;">
            <hgroup style="margin-bottom: 0;">
                <h1>{{ $countPosts }}</h1>
                <p>Posts</p>
            </hgroup>
            <h1 style="--pico-color: var(--pico-muted-color)">
                <i class="fas fa-file-alt"></i>
            </h1>
        </article>
        <article style="display: flex; justify-content: space-between;">
            <hgroup style="margin-bottom: 0;">
                <h1>{{ $countComments }}</h1>
                <p>Comments</p>
            </hgroup>
            <h1 style="--pico-color: var(--pico-muted-color)">
                <i class="fas fa-comments"></i>
            </h1>
        </article>
        <article style="display: flex; justify-content: space-between;">
            <hgroup style="margin-bottom: 0;">
                <h1>{{ $countUsers }}</h1>
                <p>Users</p>
            </hgroup>
            <h1 style="--pico-color: var(--pico-muted-color)">
                <i class="fas fa-users"></i>
            </h1>
        </article>
    </section>
@endsection