@extends('layouts.app')

@section('title', 'Project — GEORGE BOUW Construction')
@section('description', 'Bekijk onze afgeronde bouw- en renovatieprojecten.')

@section('content')
<main class="pt-32">
<!-- back link -->
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<a class="inline-flex items-center gap-2 text-sm text-neutral hover:text-white" href="/#portfolio">
<i class="h-4 w-4" data-lucide="arrow-left"></i><span>{{ __('messages.nav.portfolio') }}</span>
</a>
</div>
<!-- HERO -->
<section class="relative overflow-hidden py-10 sm:py-14">
<div class="grid-bg absolute inset-0 opacity-60"></div>
<div class="absolute -top-24 right-0 h-80 w-80 rounded-full bg-crimson/15 blur-[120px]"></div>
<div class="relative mx-auto grid max-w-6xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2">
<div class="reveal text-center lg:text-left">
<span class="inline-block rounded-full bg-crimson px-3 py-1 text-[11px] font-semibold uppercase tracking-wide">{{ ucfirst($project->category->getTranslation('name', app()->getLocale())) }}</span>
<h1 class="mt-4 font-display text-3xl font-black sm:text-5xl">{{ $project->getTranslation('title', app()->getLocale()) }}</h1>
<div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm text-neutral justify-center lg:justify-start">
<span><i data-lucide="map-pin" class="mr-1 h-4 w-4 inline"></i>{{ $project->location }}</span>
<span><i data-lucide="clock" class="mr-1 h-4 w-4 inline"></i>{{ $project->duration }}</span>
</div>
</div>
<div class="reveal">
<img alt="{{ $project->title }}" class="aspect-[4/3] w-full rounded-2xl border border-white/10 object-cover crimson-glow" src="{{ $project->heroImageUrl() }}"/>
</div>
</div>
</section>
<!-- DETAILS -->
<section class="py-10">
<div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 lg:grid-cols-3">
<div class="reveal lg:col-span-2">
<h2 class="font-display text-2xl font-extrabold">{{ __('messages.lbl.overview') }}</h2>
<p class="mt-4 leading-relaxed text-neutral">{{ $project->getTranslation('overview', app()->getLocale()) }}</p>
<h3 class="mt-8 font-display text-lg font-bold">{{ __('messages.lbl.deliverables') }}</h3>
<ul class="mt-4 space-y-3">
@foreach($project->getTranslation('deliverables', app()->getLocale()) as $deliverable)
<li class="flex items-start gap-2">
<i data-lucide="check" class="mt-1 h-4 w-4 text-crimson2"></i>
<span>{{ $deliverable }}</span>
</li>
@endforeach
</ul>
</div>
<div class="reveal rounded-2xl border border-white/10 bg-charcoal p-6">
<div class="space-y-5 text-sm">
<div class="flex items-center gap-3">
<i data-lucide="map-pin" class="h-5 w-5 text-crimson2"></i>
<div>
<div class="text-xs text-neutral">Locatie</div>
<div class="font-semibold">{{ $project->location }}</div>
</div>
</div>
<div class="flex items-center gap-3">
<i data-lucide="clock" class="h-5 w-5 text-crimson2"></i>
<div>
<div class="text-xs text-neutral">Duur</div>
<div class="font-semibold">{{ $project->duration }}</div>
</div>
</div>
<div class="flex items-center gap-3">
<i data-lucide="folder" class="h-5 w-5 text-crimson2"></i>
<div>
<div class="text-xs text-neutral">Categorie</div>
<div class="font-semibold">{{ ucfirst($project->category->getTranslation('name', app()->getLocale())) }}</div>
</div>
</div>
</div>
<a class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white hover:bg-crimson2 hover:crimson-glow" href="https://wa.me/31684954212?text={{ urlencode('Ik heb een vraag over project: ' . $project->title) }}">
<i class="h-5 w-5" data-lucide="message-circle"></i><span>{{ __('messages.cta.wa') }}</span>
</a>
</div>
</div>
</section>
<!-- PHOTO ALBUM -->
<section class="py-10">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold">{{ __('messages.lbl.album') }}</h2>
<div class="reveal mt-6 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
@foreach($project->galleryUrls() as $imageUrl)
<img alt="Project foto" class="aspect-square cursor-pointer rounded-lg object-cover transition hover:opacity-80" onclick="openLB('{{ $imageUrl }}')" src="{{ $imageUrl }}"/>
@endforeach
</div>
</div>
</section>
<!-- VIDEOS -->
@php
    $uploadedVideoUrl = $project->uploadedVideoUrl();
    $uploadedVideoMimeType = $project->uploadedVideoMimeType();
@endphp
@if($uploadedVideoUrl || filled($project->video_url))
<section class="py-10" id="pVideoSection">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold">{{ __('messages.lbl.videos') }}</h2>
<div class="reveal mt-6 grid gap-4 sm:grid-cols-2">
@if($uploadedVideoUrl)
<div class="aspect-video overflow-hidden rounded-2xl border border-white/10 bg-black">
<video class="h-full w-full" controls preload="metadata">
<source src="{{ $uploadedVideoUrl }}" type="{{ $uploadedVideoMimeType ?? 'video/mp4' }}">
</video>
</div>
@endif
@if($project->video_url)
<div class="aspect-video overflow-hidden rounded-2xl border border-white/10">
<iframe allowfullscreen class="h-full w-full" src="{{ $project->video_url }}"></iframe>
</div>
@endif
</div>
</div>
</section>
@endif
<!-- OTHER PROJECTS -->
<section class="py-14">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold">{{ __('messages.lbl.other_projects') }}</h2>
<div class="reveal mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
@foreach($others as $other)
<a href="{{ route('project.show', $other) }}" class="group">
<div class="aspect-[4/3] overflow-hidden rounded-2xl border border-white/10">
<img alt="{{ $other->title }}" class="h-full w-full object-cover transition group-hover:scale-105" src="{{ $other->heroImageUrl() }}"/>
</div>
<div class="mt-3">
<h3 class="font-display text-base font-bold">{{ $other->getTranslation('title', app()->getLocale()) }}</h3>
<p class="mt-1 text-xs text-neutral">{{ $other->location }}</p>
</div>
</a>
@endforeach
</div>
</div>
</section>
</main>
@endsection

@section('after_footer')
<div class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/90 p-4" id="lightbox">
<button class="absolute right-5 top-5 text-white/80 hover:text-white" onclick="closeLB()"><i class="h-7 w-7" data-lucide="x"></i></button>
<button class="absolute left-4 text-white/80 hover:text-white sm:left-8" onclick="stepLB(-1)"><i class="h-9 w-9" data-lucide="chevron-left"></i></button>
<button class="absolute right-4 text-white/80 hover:text-white sm:right-8" onclick="stepLB(1)"><i class="h-9 w-9" data-lucide="chevron-right"></i></button>
<div class="max-h-[85vh] w-full max-w-4xl" id="lbContent"></div>
</div>
@endsection

@push('scripts')
@vite(['resources/js/lightbox.js'])
@endpush
