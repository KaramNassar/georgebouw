@php $isHome = request()->is('/'); @endphp

@if($isHome)
<footer class="border-t border-white/5 bg-charcoal py-12">
  <div class="mx-auto max-w-7xl px-4 sm:px-6">
    <div class="flex flex-col items-center justify-between gap-6 sm:flex-row">
      <div class="flex items-center gap-3">
        <span class="grid h-10 w-10 place-items-center rounded-lg border border-crimson/40 bg-ink font-display text-base font-black"><span class="text-crimson2">G</span>B</span>
        <span><span class="block font-display text-sm font-extrabold tracking-wide">GEORGE BOUW</span><span class="block text-[10px] font-semibold uppercase tracking-[0.25em] text-crimson2" data-i18n="foot.tag">Uw Partner In Bouw &amp; Renovatie</span></span>
      </div>
      <div class="flex gap-4 text-neutral">
        <a href="#" class="transition hover:text-crimson2" aria-label="TikTok"><i data-lucide="music-2" class="h-5 w-5"></i></a>
        <a href="#" class="transition hover:text-crimson2" aria-label="Instagram"><i data-lucide="instagram" class="h-5 w-5"></i></a>
        <a href="https://wa.me/31684954212" class="transition hover:text-crimson2" aria-label="WhatsApp"><i data-lucide="message-circle" class="h-5 w-5"></i></a>
      </div>
    </div>
    <p class="mt-8 text-center text-xs text-neutral">© 2026 GEORGE BOUW Construction · info@georgebouw.nl · +31 6 84954212</p>
  </div>
</footer>

<!-- Floating WhatsApp -->
<a href="https://wa.me/31684954212" class="fixed bottom-5 right-5 z-40 inline-flex items-center gap-2 rounded-full bg-crimson px-4 py-3 font-semibold text-white shadow-lg transition hover:bg-crimson2 hover:crimson-glow">
  <i data-lucide="message-circle" class="h-5 w-5"></i><span class="hidden sm:inline text-sm" data-i18n="float.wa">Chat</span>
</a>
@else
<footer class="border-t border-white/5 bg-charcoal py-10">
  <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-4 sm:flex-row sm:px-6">
    <a href="{{ url('/') }}" class="flex items-center gap-3">
      <span class="grid h-10 w-10 place-items-center rounded-lg border border-crimson/40 bg-ink font-display text-base font-black"><span class="text-crimson2">G</span>B</span>
      <span><span class="block font-display text-sm font-extrabold">GEORGE BOUW</span><span class="block text-[10px] font-semibold uppercase tracking-[0.25em] text-crimson2" data-i18n="foot.tag">Uw Partner In Bouw &amp; Renovatie</span></span>
    </a>
    <p class="text-xs text-neutral">© 2026 GEORGE BOUW · info@georgebouw.nl · +31 6 84954212</p>
  </div>
</footer>
@endif
