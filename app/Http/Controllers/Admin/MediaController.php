<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MediaDirectory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Media\IndexRequest;
use App\Http\Requests\Admin\Media\StoreRequest;
use App\Http\Requests\Admin\Media\UpdateRequest;
use App\Models\Media;

class MediaController extends Controller
{
    public function index(IndexRequest $request)
    {
        $directories = MediaDirectory::toArray();
        $searchParams = $request->validated();
        $query = Media::query();
        $medias = $query->paginate();

        return view('admin.medias.index', compact(
            'directories',
            'medias',
            'searchParams',
        ));
    }

    public function create()
    {
        return view('admin.medias.create');
    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();
    }

    public function show(Media $media)
    {
        //
    }

    public function edit(Media $media)
    {
        return view('admin.medias.edit', compact(
            'media',
        ));
    }

    public function update(UpdateRequest $request, Media $media)
    {
        $attributes = $request->validated();

        return back();
    }

    public function destroy(Media $media)
    {
        return to_route('admin.media.index');
    }
}
