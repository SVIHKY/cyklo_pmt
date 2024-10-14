<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all(); // Načte všechny poznámky
        return view('notes', compact('notes')); // Předá data do pohledu
    }
}
