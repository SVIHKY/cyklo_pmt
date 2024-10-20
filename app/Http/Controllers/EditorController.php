<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index()
    {
        // Načtení všech záznamů z tabulky "editoros"
        $records = Editor::all();
        return view('editor', ['editoros' => $records]);
    }

    public function store(Request $request)
    {
        // Validace pole odpovídající názvu ve formuláři
        $request->validate([
            'myeditorinstance' => 'required',
        ]);

        $record = new Editor();
        $record->editoros = $request->input('myeditorinstance');  // Uložení obsahu z formuláře
        $record->save();

        return redirect()->back()->with('success', 'Text byl úspěšně uložen.');
    }

    public function destroy($id)
    {
        $record = Editor::findOrFail($id);
        $record->delete();

        return redirect()->back()->with('success', 'Záznam byl úspěšně smazán.');
    }
}
