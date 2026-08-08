<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocaleController extends Controller
{
    /**
     * Swap the site language. The nav language switch now links here
     * instead of doing a client-side-only dictionary swap, so that
     * server-rendered translatable content (services, projects, reviews,
     * process steps) is localized on the very next page load too.
     */
    public function switch(Request $request, string $locale)
    {
        $request->merge(['locale' => $locale]);

        $request->validate([
            'locale' => ['required', Rule::in(['nl', 'en'])],
        ]);

        session(['locale' => $locale]);

        return redirect()->back();
    }
}
