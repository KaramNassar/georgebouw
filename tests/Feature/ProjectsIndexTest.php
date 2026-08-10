<?php

use App\Models\Category;
use App\Models\Project;

test('projects index shows active projects', function () {
    $category = Category::query()->create([
        'name' => ['nl' => 'Renovatie', 'en' => 'Renovation'],
        'is_active' => true,
    ]);

    Project::query()->create([
        'category_id' => $category->id,
        'location' => 'Amsterdam',
        'duration' => '4 weken',
        'title' => ['nl' => 'Actief project', 'en' => 'Active project'],
        'overview' => ['nl' => 'Overzicht', 'en' => 'Overview'],
        'scope_summary' => ['nl' => 'Volledige renovatie', 'en' => 'Full renovation'],
        'deliverables' => ['nl' => ['Oplevering'], 'en' => ['Delivery']],
        'is_featured' => false,
        'is_active' => true,
    ]);

    Project::query()->create([
        'category_id' => $category->id,
        'location' => 'Rotterdam',
        'duration' => '2 weken',
        'title' => ['nl' => 'Verborgen project', 'en' => 'Hidden project'],
        'overview' => ['nl' => 'Overzicht', 'en' => 'Overview'],
        'scope_summary' => ['nl' => 'Klein werk', 'en' => 'Small work'],
        'deliverables' => ['nl' => ['Oplevering'], 'en' => ['Delivery']],
        'is_featured' => false,
        'is_active' => false,
    ]);

    $response = $this->get(route('projects.index'));

    $response->assertSuccessful()
        ->assertSee('Active project')
        ->assertDontSee('Hidden project');
});
