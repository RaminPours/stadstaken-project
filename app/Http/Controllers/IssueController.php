<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //met deze functie kunnen we alle issues ophalen uit de database en doorsturen naar de view issues.index, waar de gebruiker een overzicht van alle issues kan zien
    public function index()
    {
        $issues = Issue::latest()->get();
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // met deze functie kunnen we de view issues.create tonen, waar de gebruiker een nieuwe issue kan aanmaken
    public function create()
    {
        return view('issues.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // met deze functie kunnen we de gegevens van het formulier valideren en opslaan in de database, en daarna de gebruiker terugsturen naar de index pagina
    public function store(Request $request)
    {
        $request->validate([
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'locatie' => 'required|string|max:255',
        ]);

        Issue::create([
            'user_id' => auth()->id(),
            'titel' => $request->titel,
            'beschrijving' => $request->beschrijving,
            'locatie' => $request->locatie,
        ]);

        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     */

    // met deze functie kunnen we de view issues.show tonen, waar de gebruiker de details van een issue kan bekijken
    public function show(string $id)
    {
        $issue = Issue::findOrFail($id);
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        return view('issues.edit', compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
