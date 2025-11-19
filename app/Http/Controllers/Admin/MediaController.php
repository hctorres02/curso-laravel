<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MediaDirectory;
use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $directories = MediaDirectory::toArray();
        $searchParams = collect();
        $medias = [];

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

    public function store(Request $request)
    {
        //
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

    public function update(Request $request, Media $media)
    {
        return back();
    }

    public function destroy(Media $media)
    {
        return to_route('admin.media.index');
    }
}
