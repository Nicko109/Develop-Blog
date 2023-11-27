<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public static function index()
    {
        return Post::all();
    }

    public static function store(array $data) : Post
    {
        $path = Storage::disk('public')->put('post' , $data['image']);
        $fullPath = Storage::disk('public')->url($path);
        $data['image'] = $fullPath;
        return Post::create($data);
    }


    public static function update(Post $post, array $data)
    {


        return $post->update($data);
    }

    public static function destroy(Post $post)
    {
        return $post->delete();
    }
}
