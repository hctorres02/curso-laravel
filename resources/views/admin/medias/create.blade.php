@extends('layouts.admin')

@section('title', 'Upload media')

@section('main')
    <nav class="bottom-spaced" style="align-items: baseline">
        <h2>Upload media</h2>
    </nav>
    <section class="grid grid-4-centered">
        <x-form method="post" :action="route('admin.medias.store')">
            <x-file label="Select files" name="attachments" accept="image/*,video/*,.pdf" multiple required />
            <x-button label="Upload" icon="upload" type="submit" />
        </x-form>
    </section>
@endsection