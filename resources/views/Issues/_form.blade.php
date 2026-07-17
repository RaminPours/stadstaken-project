@if ($errors->any())
    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
        <p class="font-bold"
        >Controleer de onderstaande velden:
        </p>
        <ul class="mt-2 list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="space-y-6">
    <div>
        <label 
               for="titel" 
               class="form-label"
                >Titel
        </label>
        <input 
               type="text" 
               name="titel" 
               id="titel" 
               value="{{ old('titel', $issue->titel ?? '') }}" 
               class="form-input" 
               placeholder="Bijvoorbeeld: kapotte straatverlichting" required 
               autofocus>
        @error('titel')
            <p 
                class="mt-2 text-sm text-red-600"
                >{{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label 
               for="locatie" 
               class="form-label"
               >
               Locatie
        </label>
        <input 
               type="text" 
               name="locatie" 
               id="locatie" 
               value="{{ old('locatie', $issue->locatie ?? '') }}" 
               class="form-input" 
               placeholder="Straatnaam, huisnummer of herkenningspunt" required
               >
        @error('locatie')
            <p 
                class="mt-2 text-sm text-red-600"
               >{{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label 
               for="beschrijving" 
               class="form-label"
               >Beschrijving
        </label>
        <textarea 
                name="beschrijving" 
                id="beschrijving" 
                rows="6" 
                class="form-input resize-y" 
                placeholder="Vertel duidelijk wat er aan de hand is..." required
                >{{ old('beschrijving', $issue->beschrijving ?? '') }}
        </textarea>
        <p 
                class="mt-2 text-xs text-slate-500"
                >Beschrijf wat je ziet en sinds wanneer het probleem bestaat.
        </p>
        @error('beschrijving')
        <p 
                class="mt-2 text-sm text-red-600"
                >{{ $message }}
        </p>
        @enderror
    </div>

    @isset($issue)
        <div>
            <label 
                for="status" 
                class="form-label"
                >Status
            </label>
            <select 
                name="status" 
                id="status" 
                class="form-input">
                @foreach (['open' => 'Open', 'in behandeling' => 'In behandeling', 'verwerkt' => 'Verwerkt'] as $value => $label)
                    <option   
                        value="{{ $value }}" 
                        @selected(old('status', $issue->status) === $value)>{{ $label }}
                    </option>
                @endforeach
            </select>
        </div>
    @endisset
</div>

<div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
    <a href="{{ isset($issue) ? route('issues.show', $issue) : route('issues.index') }}" class="btn-secondary">Annuleren</a>
    <button type="submit" class="btn-primary">{{ $buttonText }}</button>
</div>
