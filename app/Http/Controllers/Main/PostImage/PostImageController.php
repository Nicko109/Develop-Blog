<?php

namespace App\Http\Controllers\Main\PostImage;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostImage\StorePostImageRequest;
use App\Http\Resources\Note\NoteResource;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\PostImage\PostImageResource;
use App\Models\Post;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostImageRequest;
use App\Models\PostImage;
use App\Services\PostImageService;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Not;

class PostImageController extends Controller
{
   public function store(StorePostImageRequest $request)
   {
       $path = Storage::disk('public')->put('/images', $request['image']);
       $image = PostImage::create([
           'path' => $path,
           'user_id' => auth()->id()
       ]);
       return new PostImageResource($image);
   }

}
