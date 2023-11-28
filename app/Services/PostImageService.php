<?php

namespace App\Services;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Storage;

class PostImageService
{
    public static function index()
    {
        return Post::all();
    }

    public static function store(array $data) : Post
    {
        $path = Storage::disk('public')->put('/images' , $data['image']);

        return PostImage::create([
            'path' => $path,
            'user_id' => auth()->id()
        ]);


    }


}
