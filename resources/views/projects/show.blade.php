@extends('layouts.app')

@section('title', 'Project — GEORGE BOUW Construction')
@section('description', 'Bekijk onze afgeronde bouw- en renovatieprojecten.')

@section('content')
<main class="pt-24">
<!-- back link -->
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<a class="inline-flex items-center gap-2 text-sm text-neutral hover:text-white" href="/#portfolio">
<i class="h-4 w-4" data-lucide="arrow-left"></i><span data-i18n="nav.portfolio">Projecten</span>
</a>
</div>
<!-- HERO -->
<section class="relative overflow-hidden py-10 sm:py-14">
<div class="grid-bg absolute inset-0 opacity-60"></div>
<div class="absolute -top-24 right-0 h-80 w-80 rounded-full bg-crimson/15 blur-[120px]"></div>
<div class="relative mx-auto grid max-w-6xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2">
<div class="reveal">
<span class="inline-block rounded-full bg-crimson px-3 py-1 text-[11px] font-semibold uppercase tracking-wide" id="pCatBadge"></span>
<h1 class="mt-4 font-display text-3xl font-black sm:text-5xl" id="pTitle"></h1>
<div class="mt-6 flex flex-wrap gap-x-6 gap-y-2 text-sm text-neutral" id="pMeta"></div>
</div>
<div class="reveal">
<img alt="" class="aspect-[4/3] w-full rounded-2xl border border-white/10 object-cover crimson-glow" id="pHeroImg"/>
</div>
</div>
</section>
<!-- DETAILS -->
<section class="py-10">
<div class="mx-auto grid max-w-6xl gap-8 px-4 sm:px-6 lg:grid-cols-3">
<div class="reveal lg:col-span-2">
<h2 class="font-display text-2xl font-extrabold" data-i18n="lbl.overview">Over dit project</h2>
<p class="mt-4 leading-relaxed text-neutral" id="pOverview"></p>
<h3 class="mt-8 font-display text-lg font-bold" data-i18n="lbl.deliverables">Opgeleverd</h3>
<ul class="mt-4 space-y-3" id="pDeliverables"></ul>
</div>
<div class="reveal rounded-2xl border border-white/10 bg-charcoal p-6">
<div class="space-y-5 text-sm" id="pFacts"></div>
<a class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white hover:bg-crimson2 hover:crimson-glow" href="#" id="pWa">
<i class="h-5 w-5" data-lucide="message-circle"></i><span data-i18n="cta.wa">Direct via WhatsApp</span>
</a>
</div>
</div>
</section>
<!-- PHOTO ALBUM -->
<section class="py-10">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold" data-i18n="lbl.album">Fotoalbum</h2>
<div class="reveal mt-6 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4" id="pAlbum"></div>
</div>
</section>
<!-- VIDEOS -->
<section class="hidden py-10" id="pVideoSection">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold" data-i18n="lbl.videos">Video's</h2>
<p class="reveal mt-1 text-xs text-neutral" data-i18n="vid.note">Demovideo — vervang door uw eigen projectvideo.</p>
<div class="reveal mt-6 grid gap-4 sm:grid-cols-2" id="pVideos"></div>
</div>
</section>
<!-- OTHER PROJECTS -->
<section class="py-14">
<div class="mx-auto max-w-6xl px-4 sm:px-6">
<h2 class="reveal font-display text-2xl font-extrabold" data-i18n="lbl.other_projects">Andere projecten</h2>
<div class="reveal mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4" id="pOthers"></div>
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
<script src="{{ asset('js/project.js') }}"></script>
@endpush
