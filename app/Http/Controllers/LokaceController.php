<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LokaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Načtení všech záznamů z tabulky "location" a předání do view
        $locations = Location::all();
        
        $locations = Location::paginate(12);
        return view('location.index')->with('locations', $locations);    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Zobrazení formuláře pro vytvoření nové lokace
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validace vstupů
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'link' => 'nullable|url',  // Odkaz je volitelný a musí být platnou URL
        ]);

        // Vytvoření nové lokace
        Location::create([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'link' => $request->input('link'),
        ]);

        // Přesměrování zpět na seznam lokací s úspěšnou zprávou
        return redirect()->route('locations.index')->with('success', 'Lokace byla úspěšně přidána.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Najdi lokaci podle ID nebo vrať 404
        $location = Location::findOrFail($id);
        return view('location.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Najdi lokaci podle ID nebo vrať 404
        $location = Location::findOrFail($id);
        return view('location.edit')->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validace vstupů
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        // Najdi lokaci a aktualizuj její hodnoty
        $location = Location::findOrFail($id);
        $location->update([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'link' => $request->input('link'),
        ]);

        // Přesměrování zpět na seznam lokací s úspěšnou zprávou
        return redirect()->route('locations.index')->with('success', 'Lokace byla úspěšně upravena.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Najdi lokaci a smaž ji
        $location = Location::findOrFail($id);
        $location->delete();

        // Přesměrování zpět na seznam lokací s úspěšnou zprávou
        return redirect()->route('locations.index')->with('success', 'Lokace byla úspěšně smazána.');
    }
}
