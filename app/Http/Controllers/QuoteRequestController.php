<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequestRequest;
use App\Models\QuoteRequest;

class QuoteRequestController extends Controller
{
    /**
     * Store a lead submitted from the "Smart Project Assistant" wizard.
     * Called via fetch()/AJAX from public/js/home.js before the WhatsApp / email
     * hand-off links are opened, so the lead is captured either way.
     */
    public function store(StoreQuoteRequestRequest $request)
    {
        $data = $request->validated();

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
