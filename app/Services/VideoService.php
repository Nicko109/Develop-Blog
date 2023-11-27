<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoService
{
    public static function index()
    {
        return Video::all();
    }

    public static function store(array $data) : Video
    {
        $path = Storage::disk('public')->put('video' , $data['file']);
        $fullPath = Storage::disk('public')->url($path);
        $data['file'] = $fullPath;
        return Video::create($data);
    }


    public static function update(Video $video, array $data)
    {


        return $video->update($data);
    }

    public static function destroy(Video $video)
    {
        return $video->delete();
    }
}
