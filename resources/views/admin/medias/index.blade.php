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
@endsection