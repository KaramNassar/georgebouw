<?php

namespace App\Http\Controllers;

use App\Models\ProcessStep;
use App\Models\Service;
use App\Models\SiteSetting;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        abort_unless($service->is_active, 404);

        $others = Service::query()
            ->active()
            ->ordered()
            ->where('id', '!=', $service->id)
            ->limit(6)
            ->get();

        return view('services.show', [
            'service' => $service,
            'others' => $others,
            'processSteps' => ProcessStep::query()->active()->ordered()->get(),
            'settings' => SiteSetting::current(),
        ]);
    }
}
