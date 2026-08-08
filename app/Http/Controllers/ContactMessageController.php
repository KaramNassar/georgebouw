<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Store a lead submitted from the footer "Contact" form.
     * Called via fetch()/AJAX from public/js/home.js before the WhatsApp
     * hand-off link is opened, so the message is captured either way.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['nullable', 'string', 'max:40'],
            'service' => ['nullable', 'string', 'max:120'], // service name/slug as sent by the form
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $service = null;
        if (! empty($data['service'])) {
            $service = Service::query()
                ->where('slug', $data['service'])
                ->first();
        }

        $contactMessage = ContactMessage::create([
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
            'service_id' => $service?->id,
            'message' => $data['message'] ?? null,
            'status' => 'new',
        ]);

        return response()->json([
            'ok' => true,
            'id' => $contactMessage->id,
        ]);
    }
}
