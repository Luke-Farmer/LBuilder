<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('media.index')
            ->withMedias($medias = Media::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $modelUser = User::find($request->user()->id);
        $modelUser->addMediaFromRequest('file')->toMediaCollection('icons');
        $modelUser->save();

        return redirect()
            ->back()
            ->with('message', 'File Uploaded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $media = Media::find($id);
        $modelId = $media->model->id;
        $modelUser = User::find($modelId);
        $modelUser->deleteMedia($media->id);

        return redirect()
            ->back();
    }

}
