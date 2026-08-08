<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuoteRequestController extends Controller
{
    /**
     * Store a lead submitted from the "Smart Project Assistant" wizard.
     * Called via fetch()/AJAX from public/js/home.js before the WhatsApp / email
     * hand-off links are opened, so the lead is captured either way.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'scope' => ['required', 'array', 'min:1'],
            'scope.*' => ['string'],
            'property_type' => ['nullable', 'string', Rule::in(['apartment', 'house', 'villa', 'commercial'])],
            'size_m2' => ['nullable', 'integer', 'min:1', 'max:1000'],
            'urgency' => ['nullable', 'string', Rule::in(['flexible', 'soon', 'urgent'])],
            'material' => ['nullable', 'string', Rule::in(['standard', 'premium', 'luxury'])],
            'budget_bracket' => ['nullable', 'string', Rule::in(['a', 'b', 'c'])],
            'estimate_low' => ['nullable', 'integer', 'min:0'],
            'estimate_high' => ['nullable', 'integer', 'min:0'],
            'locale' => ['nullable', 'string', 'max:5'],
            'photos' => ['nullable', 'array', 'max:8'],
            'photos.*' => ['image', 'max:5120'],
        ]);

        $quoteRequest = QuoteRequest::create([
            ...$data,
            'locale' => $data['locale'] ?? app()->getLocale(),
            'status' => 'new',
        ]);

        foreach ($request->file('photos', []) as $photo) {
            $quoteRequest->addMedia($photo)->toMediaCollection('photos');
        }

        return response()->json([
            'ok' => true,
            'id' => $quoteRequest->id,
        ]);
    }
}
