@extends('layouts.app')

@section('title', __('messages.projects.index.title').' - GEORGE BOUW Construction')
@section('description', __('messages.projects.index.sub'))

@section('content')
<main class="pt-32">
<section class="relative overflow-hidden py-10 sm:py-14">
<div class="grid-bg absolute inset-0 opacity-60"></div>
<div class="absolute -top-24 right-0 h-80 w-80 rounded-full bg-crimson/15 blur-[120px]"></div>
<div class="relative mx-auto max-w-6xl px-4 sm:px-6">
<a class="inline-flex items-center gap-2 text-sm text-neutral hover:text-white" href="{{ url('/#portfolio') }}">
<i class="h-4 w-4" data-lucide="arrow-left"></i><span>{{ __('messages.nav.portfolio') }}</span>
</a>
<div class="reveal mt-8 max-w-3xl text-center sm:text-left">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.port.eyebrow') }}</p>
<h1 class="mt-3 font-display text-3xl font-black sm:text-5xl">{{ __('messages.projects.index.title') }}</h1>
<p class="mt-4 text-neutral">{{ __('messages.projects.index.sub') }}</p>
</div>
</div>
</section>

<section class="pb-20">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
@if($projects->isEmpty())
<div class="reveal rounded-2xl border border-white/10 bg-charcoal p-8 text-center text-neutral">
{{ __('messages.projects.index.empty') }}
</div>
@else
<div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
@foreach($projects as $project)
<a class="reveal group" href="{{ route('project.show', $project) }}">
<div class="aspect-[4/3] overflow-hidden rounded-2xl border border-white/10 bg-charcoal">
@if($project->heroImageUrl())
<img alt="{{ $project->getTranslation('title', app()->getLocale()) }}" class="h-full w-full object-cover transition group-hover:scale-105" src="{{ $project->heroImageUrl() }}"/>
@else
<div class="grid h-full w-full place-items-center text-crimson2">
<i class="h-10 w-10" data-lucide="image"></i>
</div>
@endif
</div>
<div class="mt-3">
<span class="inline-block rounded-full bg-crimson/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-crimson2">{{ $project->category?->getTranslation('name', app()->getLocale()) }}</span>
<h2 class="mt-2 font-display text-lg font-bold">{{ $project->getTranslation('title', app()->getLocale()) }}</h2>
<p class="mt-1 text-sm text-neutral">{{ $project->location }} &middot; {{ $project->duration }}</p>
</div>
</a>
@endforeach
</div>
@endif
</div>
</section>
</main>
@endsection
