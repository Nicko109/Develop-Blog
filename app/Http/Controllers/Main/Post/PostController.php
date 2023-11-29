<?php

namespace App\Http\Controllers\Main\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\LikedPost;
use App\Models\Note;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = PostService::index();

        $posts = PostResource::collection($posts)->resolve();

        return inertia('Post/Index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Post/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $post = PostService::store($data);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = PostService::show($post);

        $post = PostResource::make($post)->resolve();

        return inertia('Post/Show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $post = PostResource::make($post)->resolve();

        return inertia('Post/Edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        $data = $request->validated();


        $data = PostService::updateImage($post, $data);
        PostService::update($post, $data);

        return redirect()->route('posts.show', compact('post'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        PostService::destroy($post);

        return redirect()->route('posts.index');

    }

    public function toggleLike(Post $post)
    {
        $res = auth()->user()->likedPosts()->toggle($post->id);

        $data['is_liked'] = count($res['attached']) > 0;
        $data['likes_count'] = $post->likedUsers()->count();
        return $data;
    }
}
