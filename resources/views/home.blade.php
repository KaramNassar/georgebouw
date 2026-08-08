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
<span data-i18n="qr.badge">Gescand vanaf visitekaartje</span>
</div>
<h3 class="font-display text-2xl font-extrabold" data-i18n="qr.title">Welkom! Uw gratis inspectie wacht.</h3>
<p class="mt-3 text-sm text-neutral" data-i18n="qr.body">Bedankt voor het scannen van onze kaart. Claim nu een <strong class="text-white">gratis inspectie &amp; offerte op locatie</strong> — geheel vrijblijvend.</p>
<div class="mt-6 flex flex-col gap-3">
<a class="inline-flex items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" href="https://wa.me/31684954212?text=Ik%20kom%20via%20het%20visitekaartje%20en%20wil%20graag%20een%20gratis%20inspectie">
<i class="h-5 w-5" data-lucide="message-circle"></i>
<span data-i18n="qr.cta">Claim gratis inspectie</span>
</a>
<button class="text-sm text-neutral underline underline-offset-4 hover:text-white" data-i18n="qr.alt" onclick="closeQR(); scrollToId('assistant')">Of bereken eerst een indicatie →</button>
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
<div class="reveal">
<div class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-charcoal px-4 py-1.5 text-xs font-semibold text-neutral">
<span class="h-2 w-2 animate-pulse rounded-full bg-crimson2"></span>
<span data-i18n="hero.badge">Bouw &amp; Renovatie · Regio Nederland</span>
</div>
<h1 class="font-display text-4xl font-black leading-[1.05] sm:text-6xl">
<span data-i18n="hero.title1">Uw Partner In</span><br/>
<span class="text-crimson2 text-glow" data-i18n="hero.title2">Bouw &amp; Renovatie</span>
</h1>
<p class="mt-6 max-w-xl text-lg text-neutral" data-i18n="hero.sub">Van badkamer tot volledige woningrenovatie — met vakmanschap, betrouwbaarheid en oog voor detail. Van A tot Z verzorgd.</p>
<div class="mt-8 flex flex-wrap gap-4">
<a class="inline-flex items-center gap-2 rounded-lg bg-crimson px-6 py-3.5 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" href="#assistant">
<i class="h-5 w-5" data-lucide="calculator"></i>
<span data-i18n="hero.cta1">Bereken uw project</span>
</a>
<a class="inline-flex items-center gap-2 rounded-lg border border-white/15 bg-charcoal px-6 py-3.5 font-semibold text-white transition hover:border-crimson/50" href="https://wa.me/31684954212">
<i class="h-5 w-5 text-crimson2" data-lucide="message-circle"></i>
<span data-i18n="hero.cta2">Direct contact</span>
</a>
</div>
<div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-3 text-sm text-neutral">
<span class="inline-flex items-center gap-2"><i class="h-4 w-4 text-crimson2" data-lucide="shield-check"></i><span data-i18n="hero.trust1">Afspraak is afspraak</span></span>
<span class="inline-flex items-center gap-2"><i class="h-4 w-4 text-crimson2" data-lucide="badge-check"></i><span data-i18n="hero.trust2">Topkwaliteit afwerking</span></span>
<span class="inline-flex items-center gap-2"><i class="h-4 w-4 text-crimson2" data-lucide="wallet"></i><span data-i18n="hero.trust3">Concurrerende prijzen</span></span>
</div>
</div>
<!-- Hero visual card -->
<div class="reveal relative">
<div class="relative rounded-2xl border border-white/10 bg-gradient-to-b from-charcoal to-ink p-8 crimson-glow">
<div class="absolute right-6 top-6 grid h-16 w-16 place-items-center rounded-xl border border-crimson/40 bg-ink font-display text-2xl font-black">
<span><span class="text-crimson2">G</span>B</span>
</div>
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2" data-i18n="hero.card.k">Kernwaarden</p>
<div class="mt-6 space-y-4">
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="hammer"></i><span class="font-semibold" data-i18n="pillar.1">Vakmanschap</span></div>
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="handshake"></i><span class="font-semibold" data-i18n="pillar.2">Betrouwbaarheid</span></div>
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="ruler"></i><span class="font-semibold" data-i18n="pillar.3">Kwaliteit in detail</span></div>
<div class="flex items-center gap-3"><i class="h-5 w-5 text-crimson2" data-lucide="check-check"></i><span class="font-semibold" data-i18n="pillar.4">Van A tot Z verzorgd</span></div>
</div>
<div class="mt-8 grid grid-cols-3 gap-3 border-t border-white/10 pt-6 text-center">
<div><div class="font-display text-2xl font-black text-crimson2">7</div><div class="text-[11px] text-neutral" data-i18n="hero.stat1">Diensten</div></div>
<div><div class="font-display text-2xl font-black text-crimson2">A–Z</div><div class="text-[11px] text-neutral" data-i18n="hero.stat2">Verzorgd</div></div>
<div><div class="font-display text-2xl font-black text-crimson2">100%</div><div class="text-[11px] text-neutral" data-i18n="hero.stat3">Vakwerk</div></div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ============ SERVICES ============ -->
<section class="border-t border-white/5 py-20 sm:py-28" id="services">
<div class="mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal max-w-2xl">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2" data-i18n="services.eyebrow">Onze Diensten</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl" data-i18n="services.title">Alles onder één dak, van A tot Z</h2>
<p class="mt-4 text-neutral" data-i18n="services.sub">Zeven kernspecialismen — vakkundig uitgevoerd volgens de strengste normen.</p>
</div>
<div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3" id="servicesGrid"></div>
</div>
</section>
<!-- ============ SMART PROJECT ASSISTANT ============ -->
<section class="relative overflow-hidden border-t border-white/5 py-20 sm:py-28" id="assistant">
<div class="absolute right-1/3 top-10 h-72 w-72 rounded-full bg-crimson/10 blur-[120px]"></div>
<div class="relative mx-auto max-w-5xl px-4 sm:px-6">
<div class="reveal mx-auto max-w-2xl text-center">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2" data-i18n="wiz.eyebrow">Slimme Projectassistent</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl" data-i18n="wiz.title">Bereken uw richtprijs in 4 stappen</h2>
<p class="mt-4 text-neutral" data-i18n="wiz.sub">Een indicatie op maat — direct, vrijblijvend en zonder verplichtingen.</p>
</div>
<div class="reveal mt-12 overflow-hidden rounded-2xl border border-white/10 bg-charcoal">
<!-- progress -->
<div class="flex items-center justify-between gap-2 border-b border-white/5 px-6 py-5 sm:px-8">
<div class="flex flex-1 items-center gap-2" id="wizardSteps"></div>
</div>
<div class="p-6 sm:p-10">
<!-- STEP 1 -->
<div class="wizard-panel" data-step="1">
<h3 class="font-display text-xl font-bold" data-i18n="wiz.s1.title">1. Welk werk wilt u laten uitvoeren?</h3>
<p class="mt-1 text-sm text-neutral" data-i18n="wiz.s1.sub">Kies één of meer diensten.</p>
<div class="mt-6 grid gap-3 sm:grid-cols-2" id="scopeGrid"></div>
</div>
<!-- STEP 2 -->
<div class="wizard-panel hidden" data-step="2">
<h3 class="font-display text-xl font-bold" data-i18n="wiz.s2.title">2. Projectgegevens</h3>
<p class="mt-1 text-sm text-neutral" data-i18n="wiz.s2.sub">Vertel ons iets meer over de ruimte.</p>
<div class="mt-6 grid gap-6 sm:grid-cols-2">
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="wiz.s2.type">Type woning</label>
<div class="grid grid-cols-2 gap-2" data-field="propertyType" id="propType"></div>
</div>
<div>
<label class="mb-2 block text-sm font-semibold"><span data-i18n="wiz.s2.size">Oppervlakte</span>: <span class="text-crimson2" id="sizeVal">25 m²</span></label>
<input class="mt-4 w-full accent-crimson" id="sizeRange" max="150" min="2" oninput="updateSize(this.value)" type="range" value="25"/>
<div class="mt-1 flex justify-between text-[11px] text-neutral"><span>2 m²</span><span>150 m²</span></div>
</div>
<div class="sm:col-span-2">
<label class="mb-2 block text-sm font-semibold" data-i18n="wiz.s2.urgency">Gewenste planning</label>
<div class="grid grid-cols-1 gap-2 sm:grid-cols-3" data-field="urgency" id="urgency"></div>
</div>
</div>
</div>
<!-- STEP 3 -->
<div class="wizard-panel hidden" data-step="3">
<h3 class="font-display text-xl font-bold" data-i18n="wiz.s3.title">3. Materiaal &amp; budget</h3>
<p class="mt-1 text-sm text-neutral" data-i18n="wiz.s3.sub">Dit bepaalt de afwerking en het prijsniveau.</p>
<div class="mt-6 space-y-6">
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="wiz.s3.material">Materiaalvoorkeur</label>
<div class="grid gap-2 sm:grid-cols-3" data-field="material" id="material"></div>
</div>
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="wiz.s3.budget">Budgetindicatie</label>
<div class="grid gap-2 sm:grid-cols-3" data-field="budget" id="budget"></div>
</div>
</div>
</div>
<!-- STEP 4 -->
<div class="wizard-panel hidden" data-step="4">
<h3 class="font-display text-xl font-bold" data-i18n="wiz.s4.title">4. Uw indicatie &amp; aanvraag</h3>
<div class="mt-6 grid gap-6 lg:grid-cols-2">
<div class="rounded-xl border border-crimson/30 bg-ink p-6 crimson-glow">
<p class="text-xs font-semibold uppercase tracking-[0.25em] text-crimson2" data-i18n="wiz.s4.estimate">Geschatte richtprijs</p>
<div class="mt-3 font-display text-4xl font-black" id="estimateBadge">€ —</div>
<p class="mt-2 text-[11px] text-neutral" data-i18n="wiz.s4.disclaimer">Indicatief. Definitieve prijs volgt na gratis inspectie op locatie.</p>
<div class="mt-5 space-y-2 border-t border-white/10 pt-5 text-sm" id="estimateSummary"></div>
</div>
<div class="space-y-4">
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="wiz.s4.name">Naam</label>
<input class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="leadName" placeholder="..." type="text"/>
</div>
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="wiz.s4.photos">Foto's uploaden <span class="font-normal text-neutral">(optioneel)</span></label>
<label class="flex cursor-pointer items-center gap-3 rounded-lg border border-dashed border-white/15 bg-ink px-4 py-3 text-sm text-neutral transition hover:border-crimson/50">
<i class="h-5 w-5 text-crimson2" data-lucide="image-plus"></i>
<span data-i18n="wiz.s4.upload" id="uploadLabel">Sleep foto's hierheen of klik</span>
<input accept="image/*" class="hidden" multiple="" onchange="onUpload(this)" type="file"/>
</label>
</div>
<div class="flex flex-col gap-3 pt-2">
<button class="inline-flex items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" onclick="submitWhatsApp()">
<i class="h-5 w-5" data-lucide="message-circle"></i>
<span data-i18n="wiz.s4.wa">Verstuur via WhatsApp</span>
</button>
<button class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/15 bg-ink px-5 py-3 font-semibold text-white transition hover:border-crimson/50" onclick="submitEmail()">
<i class="h-5 w-5 text-crimson2" data-lucide="mail"></i>
<span data-i18n="wiz.s4.email">Verstuur via e-mail</span>
</button>
</div>
</div>
</div>
</div>
</div>
<!-- nav buttons -->
<div class="flex items-center justify-between border-t border-white/5 px-6 py-5 sm:px-10">
<button class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-semibold text-neutral transition hover:text-white disabled:opacity-30" disabled="" id="wizBack" onclick="wizNav(-1)">
<i class="h-4 w-4" data-lucide="arrow-left"></i><span data-i18n="wiz.back">Terug</span>
</button>
<button class="inline-flex items-center gap-2 rounded-lg bg-crimson px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" id="wizNext" onclick="wizNav(1)">
<span data-i18n="wiz.next">Volgende</span><i class="h-4 w-4" data-lucide="arrow-right"></i>
</button>
</div>
</div>
</div>
</section>
<!-- ============ PORTFOLIO ============ -->
<section class="border-t border-white/5 py-20 sm:py-28" id="portfolio">
<div class="mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
<div class="max-w-2xl">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2" data-i18n="port.eyebrow">Projecten</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl" data-i18n="port.title">Vakwerk dat voor zich spreekt</h2>
</div>
<div class="no-scrollbar -mx-1 flex gap-2 overflow-x-auto px-1 pb-1" id="portFilters"></div>
</div>
<!-- Before / After feature -->
<div class="reveal mt-12 grid gap-8 lg:grid-cols-2">
<div>
<div class="ba-wrap aspect-[4/3] rounded-2xl border border-white/10" id="baBox">
<img alt="Voor" class="h-full w-full object-cover grayscale" src="https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AD%D9%85%D8%A7%D9%85-%D9%85%D8%B7%D8%A8%D8%AE-%D8%AA%D9%88%D8%A7%D9%84%D9%8A%D8%AA-scaled.jpg"/>
<div class="ba-after" id="baAfter">
<img alt="Na" src="https://georgebouw.nl/wp-content/uploads/2026/07/%D8%AD%D9%85%D8%A7%D9%85-%D9%85%D8%B7%D8%A8%D8%AE-%D8%AA%D9%88%D8%A7%D9%84%D9%8A%D8%AA-scaled.jpg"/>
</div>
<span class="ba-label left-3 text-neutral" data-i18n="port.before">Voor</span>
<span class="ba-label right-3 text-crimson2" data-i18n="port.after">Na</span>
<div class="ba-handle" id="baHandle"><span><i class="h-4 w-4 text-white" data-lucide="move-horizontal"></i></span></div>
<input class="ba-range" id="baRange" max="100" min="0" oninput="setBA(this.value)" type="range" value="50"/>
</div>
<p class="mt-4 text-sm text-neutral" data-i18n="port.ba.caption">Sleep de schuifknop — Badkamerrenovatie van A tot Z.</p>
</div>
<div class="grid gap-4 sm:grid-cols-2" id="portGrid"></div>
</div>
</div>
</section>
<!-- ============ PROCESS / WERKWIJZE ============ -->
<section class="relative border-t border-white/5 py-20 sm:py-28" id="process">
<div class="grid-bg absolute inset-0 opacity-60"></div>
<div class="relative mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal max-w-2xl">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2" data-i18n="proc.eyebrow">Werkwijze</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl" data-i18n="proc.title">Van eerste contact tot oplevering</h2>
</div>
<div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4" id="processGrid"></div>
</div>
</section>
<!-- ============ REVIEWS ============ -->
<section class="border-t border-white/5 py-20 sm:py-28" id="reviews">
<div class="mx-auto max-w-7xl px-4 sm:px-6">
<div class="reveal max-w-2xl">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2" data-i18n="rev.eyebrow">Reviews</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl" data-i18n="rev.title">Wat onze klanten zeggen</h2>
</div>
<div class="mt-12 grid gap-5 md:grid-cols-3" id="reviewsGrid"></div>
</div>
</section>
<!-- ============ CONTACT ============ -->
<section class="relative overflow-hidden border-t border-white/5 py-20 sm:py-28" id="contact">
<div class="absolute left-1/4 top-0 h-72 w-72 rounded-full bg-crimson/10 blur-[120px]"></div>
<div class="relative mx-auto max-w-7xl px-4 sm:px-6">
<div class="grid gap-12 lg:grid-cols-2">
<div class="reveal">
<p class="text-xs font-semibold uppercase tracking-[0.3em] text-crimson2" data-i18n="con.eyebrow">Contact &amp; Social</p>
<h2 class="mt-3 font-display text-3xl font-extrabold sm:text-4xl" data-i18n="con.title">Klaar voor uw project?</h2>
<p class="mt-4 max-w-md text-neutral" data-i18n="con.sub">Vraag een gratis inspectie &amp; offerte op locatie aan. Wij reageren snel.</p>
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
<div class="mt-8">
<p class="mb-3 text-xs font-semibold uppercase tracking-[0.25em] text-neutral" data-i18n="con.follow">Volg ons</p>
<div class="flex gap-3">
<a aria-label="TikTok" class="grid h-11 w-11 place-items-center rounded-lg border border-white/10 bg-charcoal text-neutral transition hover:border-crimson/50 hover:text-crimson2" href="#"><i class="h-5 w-5" data-lucide="music-2"></i></a>
<a aria-label="Instagram" class="grid h-11 w-11 place-items-center rounded-lg border border-white/10 bg-charcoal text-neutral transition hover:border-crimson/50 hover:text-crimson2" href="#"><i class="h-5 w-5" data-lucide="instagram"></i></a>
<a aria-label="WhatsApp" class="grid h-11 w-11 place-items-center rounded-lg border border-white/10 bg-charcoal text-neutral transition hover:border-crimson/50 hover:text-crimson2" href="https://wa.me/31684954212"><i class="h-5 w-5" data-lucide="message-circle"></i></a>
</div>
</div>
</div>
<!-- Contact form -->
<div class="reveal rounded-2xl border border-white/10 bg-charcoal p-6 sm:p-8">
<form class="space-y-4" onsubmit="return contactSubmit(event)">
<div class="grid gap-4 sm:grid-cols-2">
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="con.f.name">Naam</label>
<input class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cName" required="" type="text"/>
</div>
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="con.f.phone">Telefoon</label>
<input class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cPhone" type="tel"/>
</div>
</div>
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="con.f.service">Dienst</label>
<select class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cService"></select>
</div>
<div>
<label class="mb-2 block text-sm font-semibold" data-i18n="con.f.msg">Bericht</label>
<textarea class="w-full rounded-lg border border-white/10 bg-ink px-4 py-3 text-sm outline-none focus:border-crimson/60" id="cMsg" rows="4"></textarea>
</div>
<button class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3.5 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow" type="submit">
<i class="h-5 w-5" data-lucide="send"></i><span data-i18n="con.f.send">Aanvraag versturen</span>
</button>
<p class="text-center text-[11px] text-neutral" data-i18n="con.f.note">Reactie doorgaans binnen 24 uur.</p>
</form>
</div>
</div>
</div>
</section>
</main>
@endsection

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush
