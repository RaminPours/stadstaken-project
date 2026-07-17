<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //met deze functie kunnen we alle issues ophalen uit de database en doorsturen naar de view issues.index, waar de gebruiker een overzicht van alle issues kan zien
    public function index(Request $request)
    {
        $validated = $request->validate([
            'status' => ['nullable', Rule::in(['open', 'in behandeling', 'verwerkt'])],
            'zoeken' => ['nullable', 'string', 'max:100'],
        ]);

        $issues = Issue::query()
            ->with('user')
            ->when($validated['status'] ?? null, fn ($query, $status) => $query->where('status', $status))
            ->when($validated['zoeken'] ?? null, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('titel', 'like', "%{$search}%")
                        ->orWhere('locatie', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $counts = [
            'totaal' => Issue::count(),
            'open' => Issue::where('status', 'open')->count(),
            'in_behandeling' => Issue::where('status', 'in behandeling')->count(),
            'verwerkt' => Issue::where('status', 'verwerkt')->count(),
        ];

        return view('issues.index', compact('issues', 'counts'));
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
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'locatie' => 'required|string|max:255',
        ]);

        $request->user()->issues()->create($validated);

        return redirect()->route('issues.index')->with('success', 'Je melding is succesvol ingediend.');
    }

    /**
     * Display the specified resource.
     */

    // met deze functie kunnen we de view issues.show tonen, waar de gebruiker de details van een issue kan bekijken
    public function show(Issue $issue)
    {
        $issue->load('user');
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Issue $issue)
    {
        $this->authorizeOwner($request, $issue);
        return view('issues.edit', compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $this->authorizeOwner($request, $issue);

        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'locatie' => 'required|string|max:255',
            'status' => 'required|in:open,in behandeling,verwerkt',
        ]);

        $issue->update($validated);

        return redirect()->route('issues.show', $issue)->with('success', 'De melding is bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Issue $issue)
    {
        $this->authorizeOwner($request, $issue);
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'De melding is verwijderd.');
    }

    private function authorizeOwner(Request $request, Issue $issue): void
    {
        abort_unless(
            $request->user()->id === $issue->user_id || in_array($request->user()->role, ['medewerker', 'admin']),
            403
        );
    }
}
