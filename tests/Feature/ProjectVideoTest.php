<?php

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('project page shows uploaded video files', function () {
    Storage::fake('public');

    $category = Category::query()->create([
        'name' => ['nl' => 'Renovatie', 'en' => 'Renovation'],
        'is_active' => true,
    ]);

    $project = Project::query()->create([
        'category_id' => $category->id,
        'location' => 'Amsterdam',
        'duration' => '4 weken',
        'title' => ['nl' => 'Video project', 'en' => 'Video project'],
        'overview' => ['nl' => 'Overzicht', 'en' => 'Overview'],
        'scope_summary' => ['nl' => 'Volledige renovatie', 'en' => 'Full renovation'],
        'deliverables' => ['nl' => ['Oplevering'], 'en' => ['Delivery']],
        'is_featured' => false,
        'is_active' => true,
    ]);

    $project
        ->addMedia(UploadedFile::fake()->createWithContent(
            'project-video.mp4',
            "\x00\x00\x00\x18ftypmp42\x00\x00\x00\x00mp42isom"
        ))
        ->toMediaCollection('video');

    $response = $this->get(route('project.show', $project));

    $response->assertSuccessful()
        ->assertSee('<video', false)
        ->assertSee('project-video.mp4')
        ->assertDontSee('class="hidden py-10"', false);
});
