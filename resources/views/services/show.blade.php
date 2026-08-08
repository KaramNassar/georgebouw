@extends('layouts.app')

@section('title', 'Dienst — GEORGE BOUW Construction')
@section('description', 'Meer over onze diensten: badkamers, elektra, loodgieterswerk, stucwerk, timmerwerk, tegelwerk en sloopwerk.')

@section('content')
<main class="pt-24">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<a class="inline-flex items-center gap-2 text-sm text-neutral hover:text-white" href="/#services">
<i class="h-4 w-4" data-lucide="arrow-left"></i><span data-i18n="nav.services">Diensten</span>
</a>
</div>
<!-- HERO -->
<section class="relative overflow-hidden py-10 sm:py-14">
<div class="grid-bg absolute inset-0 opacity-60"></div>
<div class="absolute -top-24 right-0 h-80 w-80 rounded-full bg-crimson/15 blur-[120px]"></div>
<div class="relative mx-auto grid max-w-6xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2">
<div class="reveal">
<span class="grid h-16 w-16 place-items-center rounded-2xl bg-crimson/10 text-crimson2"><i class="h-8 w-8" data-lucide="hammer" id="svIconEl"></i></span>
<h1 class="mt-5 font-display text-3xl font-black sm:text-5xl" id="svTitle"></h1>
<p class="mt-4 max-w-xl text-lg text-neutral" id="svShort"></p>
<div class="mt-7 flex flex-wrap gap-4">
<a class="inline-flex items-center gap-2 rounded-lg bg-crimson px-6 py-3.5 font-semibold text-white hover:bg-crimson2 hover:crimson-glow" href="#" id="svWa">
<i class="h-5 w-5" data-lucide="message-circle"></i><span data-i18n="svd.cta">Vraag deze dienst aan</span>
</a>
<a class="inline-flex items-center gap-2 rounded-lg border border-white/15 bg-charcoal px-6 py-3.5 font-semibold text-white hover:border-crimson/50" href="/#assistant">
<i class="h-5 w-5 text-crimson2" data-lucide="calculator"></i><span data-i18n="cta.quote">Bereken uw project</span>
</a>
</div>
</div>
<div class="reveal">
<img alt="" class="aspect-[4/3] w-full rounded-2xl border border-white/10 object-cover crimson-glow" id="svHeroImg"/>
</div>
</div>
</section>
<!-- OVERVIEW + INCLUDED -->
<section class="py-10">
<div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 lg:grid-cols-3">
<div class="reveal lg:col-span-2">
<h2 class="font-display text-2xl font-extrabold" data-i18n="lbl.overview">Over deze dienst</h2>
<p class="mt-4 leading-relaxed text-neutral" id="svLong"></p>
<h3 class="mt-8 font-display text-lg font-bold" data-i18n="lbl.included">Wat is inbegrepen</h3>
<ul class="mt-4 grid gap-3 sm:grid-cols-2" id="svIncluded"></ul>
</div>
<div class="reveal rounded-2xl border border-crimson/30 bg-charcoal p-6 crimson-glow">
<div class="text-xs font-semibold uppercase tracking-[0.25em] text-crimson2" data-i18n="lbl.from">Vanaf</div>
<div class="mt-2 font-display text-4xl font-black" id="svPrice"></div>
<p class="mt-2 text-[11px] text-neutral" data-i18n="svd.pricenote">Indicatief vanafbedrag — exacte prijs na gratis inspectie.</p>
<a class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white hover:bg-crimson2 hover:crimson-glow" href="#" id="svWa2">
<i class="h-5 w-5" data-lucide="message-circle"></i><span data-i18n="cta.wa">Direct via WhatsApp</span>
</a>
</div>
</div>
</section>
<!-- PROCESS -->
<section class="relative py-12">
<div class="grid-bg absolute inset-0 opacity-50"></div>
<div class="relative mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold" data-i18n="svd.process">Zo werken wij</h2>
<div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-4" id="svProcess"></div>
</div>
</section>
<!-- GALLERY -->
<section class="py-10">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold" data-i18n="lbl.gallery">Voorbeelden</h2>
<div class="reveal mt-6 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4" id="svGallery"></div>
</div>
</section>
<!-- OTHER SERVICES -->
<section class="py-14">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold" data-i18n="lbl.other_services">Andere diensten</h2>
<div class="reveal mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3" id="svOthers"></div>
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
<script src="{{ asset('js/data.js') }}"></script>
<script src="{{ asset('js/service.js') }}"></script>
@endpush
