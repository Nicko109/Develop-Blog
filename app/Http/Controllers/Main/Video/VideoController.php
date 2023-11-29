<?php

namespace App\Http\Controllers\Main\Video;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Video\VideoResource;
use App\Models\Video;
use App\Http\Requests\Video\StoreVideoRequest;
use App\Http\Requests\Video\UpdateVideoRequest;
use App\Services\PostService;
use App\Services\VideoService;
use Mockery\Matcher\Not;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = VideoService::index();

        return inertia('Video/Index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Video/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        $data = $request->validated();

        $video = VideoService::store($data);

        return redirect()->route('videos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        $video = VideoResource::make($video)->resolve();

        return inertia('Video/Show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $video = VideoResource::make($video)->resolve();
        return inertia('Video/Edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        $data = $request->validated();

        $data = VideoService::updateFile($video, $data);

        VideoService::update($video, $data);

        return redirect()->route('videos.show', compact('video'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        VideoService::destroy($video);

        return redirect()->route('videos.index');

    }
}
