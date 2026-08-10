<?php

use App\Models\ContactMessage;
use App\Models\QuoteRequest;
use App\Models\Service;

test('quote request submissions are stored in the database', function () {
    $response = $this->postJson(route('quote-requests.store'), [
        'name' => 'George Customer',
        'scope' => ['bathroom-renovation'],
        'property_type' => 'house',
        'size_m2' => 25,
        'urgency' => 'soon',
        'material' => 'premium',
        'budget_bracket' => 'b',
        'locale' => 'nl',
    ]);

    $response->assertSuccessful()
        ->assertJson(['ok' => true]);

    $quoteRequest = QuoteRequest::query()->firstOrFail();

    expect($quoteRequest)
        ->name->toBe('George Customer')
        ->scope->toBe(['bathroom-renovation'])
        ->property_type->toBe('house')
        ->size_m2->toBe(25)
        ->urgency->toBe('soon')
        ->material->toBe('premium')
        ->budget_bracket->toBe('b')
        ->status->toBe('new');
});

test('quote request submissions require all wizard details', function () {
    $response = $this
        ->withHeader('Accept', 'application/json')
        ->post(route('quote-requests.store'), [
            'scope' => ['bathroom-renovation'],
        ]);

    expect($response->getStatusCode())->toBe(422);

    expect($response->json('errors'))->toHaveKeys([
        'name',
        'property_type',
        'size_m2',
        'urgency',
        'material',
        'budget_bracket',
    ]);

    expect(QuoteRequest::query()->exists())->toBeFalse();
});

test('contact message submissions are stored in the database', function () {
    $service = Service::query()->create([
        'name' => ['nl' => 'Badkamer', 'en' => 'Bathroom'],
        'short_description' => ['nl' => 'Kort', 'en' => 'Short'],
        'long_description' => ['nl' => 'Lang', 'en' => 'Long'],
        'included' => ['nl' => ['Inspectie'], 'en' => ['Inspection']],
        'icon' => 'hammer',
        'base_price' => 1000,
        'price_per_m2' => 100,
        'is_active' => true,
    ]);

    $response = $this->postJson(route('contact-messages.store'), [
        'name' => 'George Customer',
        'phone' => '+31612345678',
        'service' => $service->slug,
        'message' => 'Please contact me.',
    ]);

    $response->assertSuccessful()
        ->assertJson(['ok' => true]);

    $contactMessage = ContactMessage::query()->firstOrFail();

    expect($contactMessage)
        ->name->toBe('George Customer')
        ->phone->toBe('+31612345678')
        ->service_id->toBe($service->id)
        ->message->toBe('Please contact me.')
        ->status->toBe('new');
});
