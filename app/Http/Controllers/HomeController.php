<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProcessStep;
use App\Models\Review;
use App\Models\Service;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $locale = app()->getLocale();

        $services = Service::query()->active()->ordered()->get();
        $projects = Project::query()->active()->ordered()->get();
        $reviews = Review::query()->active()->ordered()->get();
        $processSteps = ProcessStep::query()->active()->ordered()->get();
        $settings = SiteSetting::current();

        return view('home', [
            'settings' => $settings,
            'processSteps' => $processSteps,
            'reviews' => $reviews,
            'projects' => $projects,
            'services' => $services,

            // JSON payloads consumed by public/js/home.js — see README-BACKEND.md
            // for the exact shape expected by the wizard / grid render functions.
            'servicesJson' => $services->map(fn (Service $service) => [
                'id' => $service->slug,
                'icon' => $service->icon,
                'base' => $service->base_price,
                'm2' => $service->price_per_m2,
                'name' => $service->getTranslations('name'),
                'description' => $service->getTranslations('short_description'),
                'image' => $service->heroImageUrl(),
            ])->values(),

            'projectsJson' => $projects->map(fn (Project $project) => [
                'id' => $project->slug,
                'cat' => $project->category,
                'location' => $project->location,
                'duration' => $project->duration,
                'title' => $project->getTranslations('title'),
                'scope' => $project->getTranslations('scope_summary'),
                'image' => $project->heroImageUrl(),
            ])->values(),

            'locale' => $locale,
        ]);
    }
}
