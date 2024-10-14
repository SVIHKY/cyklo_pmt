<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{

    public function store(Request $request)
    {
        // Validace
        $request->validate([
            'content' => 'required|string|max:65535',
        ]);

        // Uložení do databáze
        Text::create([
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', 'Text byl úspěšně uložen!');
    }
}
