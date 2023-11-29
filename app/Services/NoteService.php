<?php

namespace App\Services;

use App\Models\Note;

class NoteService
{
    public static function index()
    {
        return Note::latest()->get();
    }

    public static function store(array $data) : Note
    {

        return Note::create($data);
    }


    public static function update(Note $note, array $data)
    {

        return $note->update($data);
    }

    public static function destroy(Note $note)
    {
        return $note->delete();
    }
}
