<?php

namespace App\Http\Controllers\Main\Note;

use App\Http\Controllers\Controller;
use App\Http\Resources\Note\NoteResource;
use App\Models\Note;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;
use App\Services\NoteService;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = NoteService::index();

        $notes = NoteResource::collection($notes)->resolve();

        return inertia('Note/Index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Note/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $data = $request->validated();

        $note = NoteService::store($data);

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $note = NoteService::show($note);

        $note = NoteResource::make($note)->resolve();

        return inertia('Note/Show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $note = NoteResource::make($note)->resolve();
        return inertia('Note/Edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $data = $request->validated();
        NoteService::update($note, $data);

        return redirect()->route('notes.show', compact('note'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        NoteService::destroy($note);

        return redirect()->route('notes.index');

    }

    public function toggleLike(Note $note)
    {
        $res = auth()->user()->likedNotes()->toggle($note->id);

        $data['is_liked'] = count($res['attached']) > 0;
        $data['likes_count'] = $note->likedUsers()->count();
        return $data;
    }

}
