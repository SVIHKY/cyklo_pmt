<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function showEditor()
    {
        return view('editor');
    }

    public function saveContent(Request $request)
    {
        // Validate and save content here
        $request->validate([
            'content' => 'required|string',
        ]);

        // Save to database or file, for example
        // $content = $request->input('content');
        // Post::create(['content' => $content]);

        return redirect('/editor')->with('success', 'Content saved successfully!');
    }
}
