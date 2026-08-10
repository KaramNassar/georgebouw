@extends('layouts.app')

@section('title', 'GEORGE BOUW Construction — Uw Partner In Bouw & Renovatie')
@section('description', 'GEORGE BOUW Construction — Vakmanschap, betrouwbaarheid en kwaliteit in detail. Van A tot Z verzorgd. Badkamers, keukens, elektra, loodgieterswerk, stucwerk, timmerwerk en tegelwerk.')

@section('before_nav')
<div class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/80 backdrop-blur-sm" id="qrModal">
<div class="relative w-full max-w-md rounded-2xl border border-crimson/40 bg-charcoal p-8 crimson-glow">
<button aria-label="Close" class="absolute right-4 top-4 text-neutral hover:text-white" onclick="closeQR()">
<i class="h-5 w-5" data-lucide="x"></i>
</button>
<div class="mb-4 inline-flex items-center gap-2 rounded-full border border-crimson/40 bg-crimson/10 px-3 py-1 text-xs font-semibold text-crimson2">
<i class="h-4 w-4" data-lucide="qr-code"></i>
<span>{{ __('messages.qr.badge') }}</span>
</div>
<h3 class="font-display text-2xl font-extrabold">{{ __('messages.qr.title') }}</h3>
<p class="mt-3 text-sm text-neutral">{{ __('messages.qr.body') }}</p>
<div class="mt-6 flex flex-col gap-3">
<a class="inline-flex items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" href="https://wa.me/31684954212?text=Ik%20kom%20via%20het%20visitekaartje%20en%20wil%20graag%20een%20gratis%20inspectie">
<i class="h-5 w-5" data-lucide="message-circle"></i>
<span>{{ __('messages.qr.cta') }}</span>
</a>
<button class="text-sm text-neutral underline underline-offset-4 hover:text-white" onclick="closeQR(); scrollToId('assistant')">{{ __('messages.qr.alt') }}</button>
</div>
</div>
</div>
@endsection

@section('content')
<main id="top">
<!-- ============ HERO ============ -->
<section class="relative overflow-hidden pt-32 pb-20 sm:pt-40 sm:pb-28">
<div class="grid-bg absolute inset-0"></div>
<div class="absolute -top-24 right-0 h-96 w-96 rounded-full bg-crimson/20 blur-[120px]"></div>
<div class="absolute bottom-0 left-1/4 h-72 w-72 rounded-full bg-crimson/10 blur-[120px]"></div>
<div class="relative mx-auto max-w-7xl px-4 sm:px-6">
<div class="grid items-center gap-12 lg:grid-cols-2">
<div class="reveal text-center lg:text-left">
<div class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-charcoal px-4 py-1.5 text-xs font-semibold text-neutral">
<span class="h-2 w-2 animate-pulse rounded-full bg-crimson2"></span>
<span>{{ __('messages.hero.badge') }}</span>
</div>
<h1 class="font-display text-4xl font-black leading-[1.05] sm:text-6xl">
<span>{{ __('messages.hero.title1') }}</span><br/>
<span class="text-crimson2 text-glow">{{ __('messages.hero.title2') }}</span>
</h1>
<p class="mt-6 max-w-xl text-lg text-neutral mx-auto lg:mx-0">{{ __('messages.hero.sub') }}</p>
<div class="mt-8 flex flex-wrap gap-4 justify-center lg:justify-start">
<a class="inline-flex items-center gap-2 rounded-lg bg-crimson px-6 py-3.5 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" href="#assistant">
<i class="h-5 w-5" data-lucide="calculator"></i>
<span>{{ __('messages.hero.cta1') }}</span>
</a>
<a class="inline-flex items-center gap-2 rounded-lg border border-white/15 bg-charcoal px-6 py-3.5 font-semibold text-white transition hover:border-crimson/50" href="https://wa.me/31684954212">
<i class="h-5 w-5 text-crimson2" data-lucide="message-circle"></i>
<span>{{ __('messages.hero.cta2') }}</span>
</a>
</div>
<div class="mt-10 flex flex-wrap items-center justify-center gap-x-8 gap-y-3 text-sm text-neutral lg:justify-start">
<span class="inline-flex items-center gap-2"><i class="h-4 w-4 text-crimson2" data-lucide="shield-check"></i><span>{{ __('messages.hero.trust1') }}</span></span>
<span class="inline-flex items-center gap-2"><i class="h-4 w-4 text-crimson2" data-lucide="badge-check"></i><span>{{ __('messages.hero.trust2') }}</span></span>
<span class="inline-flex items-center gap-2"><i class="h-4 w-4 text-crimson2" data-lucide="wallet"></i><span>{{ __('messages.hero.trust3') }}</span></span>
</div>
</div>
<!-- Hero visual card -->
<div class="reveal relative">
<div class="relative rounded-2xl border border-white/10 bg-gradient-to-b from-charcoal to-ink p-8 crimson-glow">
<div class="absolute right-6 top-6 grid h-16 w-16 place-items-center rounded-xl border border-crimson/40 bg-ink font-display text-2xl font-black">
<span>
      <img alt="GEORGE BOUW Logo" class="h-14 w-auto" src="{{ asset('images/logo.png') }}"/>
</span>
</div>
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.hero.card.k') }}</p>
<div class="mt-6 space-y-4">
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="hammer"></i><span class="font-semibold">{{ __('messages.pillar.1') }}</span></div>
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="handshake"></i><span class="font-semibold">{{ __('messages.pillar.2') }}</span></div>
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="ruler"></i><span class="font-semibold">{{ __('messages.pillar.3') }}</span></div>
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="check-check"></i><span class="font-semibold">{{ __('messages.pillar.4') }}</span></div>
</div>
<div class="mt-8 grid grid-cols-3 gap-3 border-t border-white/10 pt-6 text-center">
<div><div class="font-display text-2xl font-black text-crimson2">7</div><div class="text-[11px] text-neutral">{{ __('messages.hero.stat1') }}</div></div>
<div><div class="font-display text-2xl font-black text-crimson2">A–Z</div><div class="text-[11px] text-neutral">{{ __('messages.hero.stat2') }}</div></div>
<div><div class="font-display text-2xl font-black text-crimson2">100%</div><div class="text-[11px] text-neutral">{{ __('messages.hero.stat3') }}</div></div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ============ SERVICES ============ -->
<section class="border-t border-white/5 py-20 sm:py-28" id="services">
<div class="mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal max-w-2xl text-center lg:text-left">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.services.eyebrow') }}</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl">{{ __('messages.services.title') }}</h2>
<p class="mt-4 text-neutral">{{ __('messages.services.sub') }}</p>
</div>
<div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
@foreach($services as $service)
<a href="{{ route('service.show', $service) }}" class="reveal group rounded-2xl border border-white/10 bg-charcoal p-6 transition hover:border-crimson/50">
<div class="mb-4 grid h-12 w-12 place-items-center rounded-xl bg-crimson/10 text-crimson2">
<i data-lucide="{{ $service->icon }}" class="h-6 w-6"></i>
</div>
<h3 class="font-display text-lg font-bold">{{ $service->name }}</h3>
<p class="mt-2 text-sm text-neutral">{{ $service->short_description }}</p>
<div class="mt-4 flex items-center gap-2 text-sm font-semibold text-crimson2">
<span>Meer info</span>
<i data-lucide="arrow-right" class="h-4 w-4 transition group-hover:translate-x-1"></i>
</div>
</a>
@endforeach
</div>
</div>
</section>
<!-- ============ SMART PROJECT ASSISTANT ============ -->
<section class="relative overflow-hidden border-t border-white/5 py-20 sm:py-28" id="assistant">
<div class="absolute right-1/3 top-10 h-72 w-72 rounded-full bg-crimson/10 blur-[120px]"></div>
<div class="relative mx-auto max-w-5xl px-4 sm:px-6">
<div class="reveal mx-auto max-w-2xl text-center">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.wiz.eyebrow') }}</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl">{{ __('messages.wiz.title') }}</h2>
<p class="mt-4 text-neutral">{{ __('messages.wiz.sub') }}</p>
</div>
<div class="reveal mt-12 overflow-hidden rounded-2xl border border-white/10 bg-charcoal">
<!-- progress -->
<div class="flex items-center justify-between gap-2 border-b border-white/5 px-6 py-5 sm:px-8">
<div class="flex flex-1 items-center gap-2" id="wizardSteps"></div>
</div>
<div class="p-6 sm:p-10">
<!-- STEP 1 -->
<div class="wizard-panel" data-step="1">
<h3 class="font-display text-xl font-bold">{{ __('messages.wiz.s1.title') }}</h3>
<p class="mt-1 text-sm text-neutral">{{ __('messages.wiz.s1.sub') }}</p>
<div class="mt-6 grid gap-3 sm:grid-cols-2">
@foreach($services as $service)
<label class="flex cursor-pointer items-center gap-3 rounded-lg border border-white/10 bg-ink p-4 transition hover:border-crimson/50">
<input class="accent-crimson" data-service="{{ $service->slug }}" data-base="{{ $service->base_price }}" data-m2="{{ $service->price_per_m2 }}" type="checkbox" value="{{ $service->slug }}"/>
<div class="grid h-10 w-10 place-items-center rounded-lg bg-crimson/10 text-crimson2">
<i data-lucide="{{ $service->icon }}" class="h-5 w-5"></i>
</div>
<span class="font-semibold">{{ $service->name }}</span>
</label>
@endforeach
</div>
</div>
<!-- STEP 2 -->
<div class="wizard-panel hidden" data-step="2">
<h3 class="font-display text-xl font-bold">{{ __('messages.wiz.s2.title') }}</h3>
<p class="mt-1 text-sm text-neutral">{{ __('messages.wiz.s2.sub') }}</p>
<div class="mt-6 grid gap-6 sm:grid-cols-2">
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.wiz.s2.type') }}</label>
<div class="grid grid-cols-2 gap-2" data-field="propertyType" id="propType">
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="propertyType" type="radio" value="apartment"/>
<span>Appartement</span>
</label>
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="propertyType" type="radio" value="house"/>
<span>Woning</span>
</label>
</div>
</div>
<div>
<label class="mb-2 block text-sm font-semibold"><span>{{ __('messages.wiz.s2.size') }}</span>: <span class="text-crimson2" id="sizeVal">25 m²</span></label>
<input class="mt-4 w-full accent-crimson" id="sizeRange" max="150" min="2" oninput="updateSize(this.value)" type="range" value="25"/>
<div class="mt-1 flex justify-between text-[11px] text-neutral"><span>2 m²</span><span>150 m²</span></div>
</div>
<div class="sm:col-span-2">
<label class="mb-2 block text-sm font-semibold">{{ __('messages.wiz.s2.urgency') }}</label>
<div class="grid grid-cols-1 gap-2 sm:grid-cols-3" data-field="urgency" id="urgency">
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="urgency" type="radio" value="flexible"/>
<span>Flexibel</span>
</label>
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="urgency" type="radio" value="1-3months"/>
<span>1-3 maanden</span>
</label>
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="urgency" type="radio" value="asap"/>
<span>ZSM</span>
</label>
</div>
</div>
</div>
</div>
<!-- STEP 3 -->
<div class="wizard-panel hidden" data-step="3">
<h3 class="font-display text-xl font-bold">{{ __('messages.wiz.s3.title') }}</h3>
<p class="mt-1 text-sm text-neutral">{{ __('messages.wiz.s3.sub') }}</p>
<div class="mt-6 space-y-6">
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.wiz.s3.material') }}</label>
<div class="grid gap-2 sm:grid-cols-3" data-field="material" id="material">
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="material" type="radio" value="basic"/>
<span>Basis</span>
</label>
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="material" type="radio" value="standard"/>
<span>Standaard</span>
</label>
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="material" type="radio" value="premium"/>
<span>Premium</span>
</label>
</div>
</div>
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.wiz.s3.budget') }}</label>
<div class="grid gap-2 sm:grid-cols-3" data-field="budget" id="budget">
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="budget" type="radio" value="economy"/>
<span>Economy</span>
</label>
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="budget" type="radio" value="mid"/>
<span>Midden</span>
</label>
<label class="flex cursor-pointer items-center justify-center gap-2 rounded-lg border border-white/10 bg-ink p-3 text-center transition hover:border-crimson/50">
<input class="accent-crimson" name="budget" type="radio" value="high"/>
<span>Hoog</span>
</label>
</div>
</div>
</div>
</div>
<!-- STEP 4 -->
<div class="wizard-panel hidden" data-step="4">
<h3 class="font-display text-xl font-bold">{{ __('messages.wiz.s4.title') }}</h3>
<div class="mt-6 grid gap-6 lg:grid-cols-2">
<div class="rounded-xl border border-crimson/30 bg-ink p-6 crimson-glow">
<p class="text-xs font-semibold uppercase tracking-[0.25em] text-crimson2">{{ __('messages.wiz.s4.estimate') }}</p>
<div class="mt-3 font-display text-4xl font-black" id="estimateBadge">€ —</div>
<p class="mt-2 text-[11px] text-neutral">{{ __('messages.wiz.s4.disclaimer') }}</p>
<div class="mt-5 space-y-2 border-t border-white/10 pt-5 text-sm" id="estimateSummary"></div>
</div>
<div class="space-y-4">
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.wiz.s4.name') }}</label>
<input class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="leadName" placeholder="..." type="text"/>
</div>
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.wiz.s4.photos') }} <span class="font-normal text-neutral">(optioneel)</span></label>
<label class="flex cursor-pointer items-center gap-3 rounded-lg border border-dashed border-white/15 bg-ink px-4 py-3 text-sm text-neutral transition hover:border-crimson/50">
<i class="h-5 w-5 text-crimson2" data-lucide="image-plus"></i>
<span id="uploadLabel">{{ __('messages.wiz.s4.upload') }}</span>
<input accept="image/*" class="hidden" id="quotePhotos" multiple="" onchange="onUpload(this)" type="file"/>
</label>
</div>
<div class="flex flex-col gap-3 pt-2">
<button class="inline-flex items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" onclick="submitWhatsApp()">
<i class="h-5 w-5" data-lucide="message-circle"></i>
<span>{{ __('messages.wiz.s4.wa') }}</span>
</button>
<button class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/15 bg-ink px-5 py-3 font-semibold text-white transition hover:border-crimson/50" onclick="submitEmail()">
<i class="h-5 w-5 text-crimson2" data-lucide="mail"></i>
<span>{{ __('messages.wiz.s4.email') }}</span>
</button>
</div>
</div>
</div>
</div>
</div>
<!-- nav buttons -->
<div class="flex items-center justify-between border-t border-white/5 px-6 py-5 sm:px-10">
<button class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-neutral transition hover:text-white disabled:opacity-30" disabled="" id="wizBack" onclick="wizNav(-1)">
<i class="h-4 w-4" data-lucide="arrow-left"></i><span>{{ __('messages.wiz.back') }}</span>
</button>
<button class="inline-flex items-center gap-2 rounded-lg bg-crimson px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" id="wizNext" onclick="wizNav(1)">
<span>{{ __('messages.wiz.next') }}</span><i class="h-4 w-4" data-lucide="arrow-right"></i>
</button>
</div>
</div>
</div>
</section>
<!-- ============ PORTFOLIO ============ -->
<section class="border-t border-white/5 py-20 sm:py-28" id="portfolio">
<div class="mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
<div class="max-w-2xl text-center lg:text-left">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.port.eyebrow') }}</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl">{{ __('messages.port.title') }}</h2>
</div>
<div class="no-scrollbar -mx-1 flex gap-2 overflow-x-auto px-1 pb-1">
<button class="filter-btn whitespace-nowrap rounded-full border border-white/10 bg-charcoal px-4 py-2 text-sm font-semibold text-neutral transition hover:border-crimson/50 hover:text-white" data-filter="all">Alle</button>
@foreach($categories as $category)
<button class="filter-btn whitespace-nowrap rounded-full border border-white/10 bg-charcoal px-4 py-2 text-sm font-semibold text-neutral transition hover:border-crimson/50 hover:text-white" data-filter="{{ $category->id }}">{{ $category->name }}</button>
@endforeach
</div>
</div>
<!-- Before / After feature -->
{{-- <div class="reveal mt-12 grid gap-8 lg:grid-cols-2">
<div>
<div class="ba-wrap aspect-[4/3] rounded-2xl border border-white/10" id="baBox">
<img alt="Voor" class="h-full w-full object-cover grayscale" src="https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AD%D9%85%D8%A7%D9%85-%D9%85%D8%B7%D8%A8%D8%AE-%D8%AA%D9%88%D8%A7%D9%84%D9%8A%D8%AA-scaled.jpg"/>
<div class="ba-after" id="baAfter">
<img alt="Na" src="https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AD%D9%85%D8%A7%D9%85-%D9%85%D8%B7%D8%A8%D8%AE-%D8%AA%D9%88%D8%A7%D9%84%D9%8A%D8%AA-scaled.jpg"/>
</div>
<span class="ba-label left-3 text-neutral">{{ __('messages.port.before') }}</span>
<span class="ba-label right-3 text-crimson2">{{ __('messages.port.after') }}</span>
<div class="ba-handle" id="baHandle"><span><i class="h-4 w-4 text-white" data-lucide="move-horizontal"></i></span></div>
<input class="ba-range" id="baRange" max="100" min="0" oninput="setBA(this.value)" type="range" value="50"/>
</div>
<p class="mt-4 text-sm text-neutral">{{ __('messages.port.ba.caption') }}</p>
</div> --}}
<div class="grid gap-4 mt-12 sm:grid-cols-2">
@foreach($projects as $project)
<a href="{{ route('project.show', $project) }}" class="reveal group" data-category="{{ $project->category_id }}">
<div class="aspect-[4/3] overflow-hidden rounded-2xl border border-white/10">
<img alt="{{ $project->title }}" class="h-full w-full object-cover transition group-hover:scale-105" src="{{ $project->heroImageUrl() }}"/>
</div>
<div class="mt-3">
<span class="inline-block rounded-full bg-crimson/10 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-crimson2">{{ $project->category->name }}</span>
<h3 class="mt-2 font-display text-lg font-bold">{{ $project->title }}</h3>
<p class="mt-1 text-sm text-neutral">{{ $project->location }} · {{ $project->duration }}</p>
</div>
</a>
@endforeach
</div>
</div>
</div>
</section>
<!-- ============ PROCESS / WERKWIJZE ============ -->
<section class="relative border-t border-white/5 py-20 sm:py-28" id="process">
<div class="grid-bg absolute inset-0 opacity-60"></div>
<div class="relative mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal max-w-2xl text-center lg:text-left">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.proc.eyebrow') }}</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl">{{ __('messages.proc.title') }}</h2>
</div>
<div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
@foreach($processSteps as $step)
<div class="reveal rounded-2xl border border-white/10 bg-charcoal p-6">
<div class="mb-4 grid h-12 w-12 place-items-center rounded-xl bg-crimson/10 text-crimson2">
<i data-lucide="{{ $step->icon }}" class="h-6 w-6"></i>
</div>
<h3 class="font-display text-lg font-bold">{{ $step->title }}</h3>
<p class="mt-2 text-sm text-neutral">{{ $step->description }}</p>
</div>
@endforeach
</div>
</div>
</section>
<!-- ============ REVIEWS ============ -->
<section class="border-t border-white/5 py-20 sm:py-28" id="reviews">
<div class="mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal max-w-2xl text-center lg:text-left">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.rev.eyebrow') }}</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl">{{ __('messages.rev.title') }}</h2>
</div>
<div class="mt-12 grid gap-5 md:grid-cols-3">
@foreach($reviews as $review)
<div class="reveal rounded-2xl border border-white/10 bg-charcoal p-6">
<div class="mb-4 flex gap-1">
@for($i = 1; $i <= 5; $i++)
<i data-lucide="star" class="h-4 w-4 {{ $i <= $review->rating ? 'fill-crimson2 text-crimson2' : 'text-neutral' }}"></i>
@endfor
</div>
<p class="text-sm italic text-neutral">"{{ $review->quote }}"</p>
<div class="mt-4 flex items-center gap-3">
<div class="grid h-10 w-10 place-items-center rounded-full bg-crimson/10 text-crimson2 font-bold">
{{ substr($review->client_name, 0, 1) }}
</div>
<div>
<div class="text-sm font-semibold">{{ $review->client_name }}</div>
<div class="text-xs text-neutral">{{ $review->service_label }}</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>
<!-- ============ CONTACT ============ -->
<section class="relative overflow-hidden border-t border-white/5 py-20 sm:py-28" id="contact">
<div class="absolute left-1/4 top-0 h-72 w-72 rounded-full bg-crimson/10 blur-[120px]"></div>
<div class="relative mx-auto max-w-7xl px-4 sm:px-6">
<div class="grid gap-12 lg:grid-cols-2">
<div class="reveal text-center lg:text-left">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2">{{ __('messages.con.eyebrow') }}</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl">{{ __('messages.con.title') }}</h2>
<p class="mt-4 max-w-md text-neutral mx-auto lg:mx-0">{{ __('messages.con.sub') }}</p>
<div class="mt-8 space-y-4">
<a class="flex items-center gap-4 rounded-xl border border-white/10 bg-charcoal p-4 transition hover:border-crimson/50" href="https://wa.me/31684954212">
<span class="grid h-11 w-11 place-items-center rounded-lg bg-crimson/15 text-crimson2"><i class="h-5 w-5" data-lucide="message-circle"></i></span>
<span><span class="block text-sm font-semibold">WhatsApp</span><span class="block text-sm text-neutral">+31 6 84954212</span></span>
</a>
<a class="flex items-center gap-4 rounded-xl border border-white/10 bg-charcoal p-4 transition hover:border-crimson/50" href="mailto:info@georgebouw.nl">
<span class="grid h-11 w-11 place-items-center rounded-lg bg-crimson/15 text-crimson2"><i class="h-5 w-5" data-lucide="mail"></i></span>
<span><span class="block text-sm font-semibold">E-mail</span><span class="block text-sm text-neutral">info@georgebouw.nl</span></span>
</a>
<a class="flex items-center gap-4 rounded-xl border border-white/10 bg-charcoal p-4 transition hover:border-crimson/50" href="https://georgebouw.nl">
<span class="grid h-11 w-11 place-items-center rounded-lg bg-crimson/15 text-crimson2"><i class="h-5 w-5" data-lucide="globe"></i></span>
<span><span class="block text-sm font-semibold">Website</span><span class="block text-sm text-neutral">georgebouw.nl</span></span>
</a>
</div>
<div class="mt-8 flex flex-col items-center lg:items-start">
@php
    $whatsappSocialUrl = filled($settings->whatsapp_number) ? 'https://wa.me/'.$settings->whatsappDigits() : null;
    $hasSocialLinks = filled($settings->tiktok_url) || filled($settings->instagram_url) || filled($whatsappSocialUrl);
@endphp
@if($hasSocialLinks)
<p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-neutral">{{ __('messages.con.follow') }}</p>
<div class="flex gap-3">
@if(filled($settings->tiktok_url))
<a aria-label="TikTok" class="grid h-11 w-11 place-items-center rounded-lg border border-white/10 bg-charcoal text-neutral transition hover:border-crimson/50 hover:text-crimson2" href="{{ $settings->tiktok_url }}" rel="noopener" target="_blank"><i class="h-5 w-5" data-lucide="music-2"></i></a>
@endif
@if(filled($settings->instagram_url))
<a aria-label="Instagram" class="grid h-11 w-11 place-items-center rounded-lg border border-white/10 bg-charcoal text-neutral transition hover:border-crimson/50 hover:text-crimson2" href="{{ $settings->instagram_url }}" rel="noopener" target="_blank">
<svg aria-hidden="true" class="h-5 w-5" fill="none" viewBox="0 0 24 24">
<rect height="18" rx="5" stroke="currentColor" stroke-width="2" width="18" x="3" y="3"></rect>
<circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"></circle>
<circle cx="17.5" cy="6.5" fill="currentColor" r="1.25"></circle>
</svg>
</a>
@endif
@if($whatsappSocialUrl)
<a aria-label="WhatsApp" class="grid h-11 w-11 place-items-center rounded-lg border border-white/10 bg-charcoal text-neutral transition hover:border-crimson/50 hover:text-crimson2" href="{{ $whatsappSocialUrl }}" rel="noopener" target="_blank">
<svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
<path d="M12.04 2C6.57 2 2.12 6.34 2.12 11.68c0 1.7.46 3.35 1.34 4.8L2 22l5.66-1.44a10.2 10.2 0 0 0 4.38.99c5.47 0 9.92-4.34 9.92-9.68S17.51 2 12.04 2Zm0 17.9c-1.43 0-2.83-.37-4.06-1.08l-.29-.17-3.36.86.87-3.22-.19-.3a8.04 8.04 0 0 1-1.25-4.31c0-4.43 3.71-8.03 8.28-8.03s8.28 3.6 8.28 8.03-3.72 8.22-8.28 8.22Zm4.54-6.01c-.25-.12-1.47-.7-1.7-.79-.23-.08-.4-.12-.57.12-.17.25-.65.79-.8.95-.15.17-.29.19-.54.07-.25-.13-1.06-.38-2.02-1.21-.75-.65-1.25-1.45-1.39-1.69-.15-.25-.02-.38.11-.5.12-.11.25-.29.38-.43.13-.15.17-.25.25-.42.08-.16.04-.31-.02-.43-.06-.13-.57-1.34-.78-1.83-.2-.47-.41-.41-.57-.42h-.49c-.17 0-.44.06-.67.31-.23.25-.88.84-.88 2.04s.9 2.36 1.02 2.52c.13.17 1.78 2.65 4.31 3.72.6.25 1.07.4 1.44.52.6.19 1.15.16 1.58.1.48-.07 1.47-.58 1.68-1.15.21-.56.21-1.04.15-1.15-.06-.1-.23-.16-.48-.28Z"></path>
</svg>
</a>
@endif
</div>
@endif
</div>
</div>
<!-- Contact form -->
<div class="reveal rounded-2xl border border-white/10 bg-charcoal p-6 sm:p-8">
<form class="space-y-4" onsubmit="return contactSubmit(event)">
<div class="grid gap-4 sm:grid-cols-2">
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.con.f.name') }}</label>
<input class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cName" required="" type="text"/>
</div>
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.con.f.phone') }}</label>
<input class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cPhone" type="tel"/>
</div>
</div>
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.con.f.service') }}</label>
<select class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cService">
<option value="">Kies een dienst...</option>
@foreach($services as $service)
<option value="{{ $service->slug }}">{{ $service->name }}</option>
@endforeach
</select>
</div>
<div>
<label class="mb-2 block text-sm font-semibold">{{ __('messages.con.f.msg') }}</label>
<textarea class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cMsg" rows="4" required=""></textarea>
</div>
<button class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3.5 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" type="submit">
<i class="h-5 w-5" data-lucide="send"></i><span>{{ __('messages.con.f.send') }}</span>
</button>
<p class="hidden rounded-lg border border-crimson/30 bg-crimson/10 px-4 py-3 text-center text-sm font-semibold text-white" id="contactStatus">{{ __('messages.con.f.thanks') }}</p>
<p class="text-center text-[11px] text-neutral">{{ __('messages.con.f.note') }}</p>
</form>
</div>
</div>
</div>
</section>
</main>
@endsection

@push('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endpush
