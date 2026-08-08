<div id="qrModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/80 backdrop-blur-sm">
  <div class="relative w-full max-w-md rounded-2xl border border-crimson/40 bg-charcoal p-8 crimson-glow">
    <button onclick="closeQR()" class="absolute right-4 top-4 text-neutral hover:text-white" aria-label="Close">
      <i data-lucide="x" class="h-5 w-5"></i>
    </button>
    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-crimson/40 bg-crimson/10 px-3 py-1 text-xs font-semibold text-crimson2">
      <i data-lucide="qr-code" class="h-4 w-4"></i>
      <span data-i18n="qr.badge">Gescand vanaf visitekaartje</span>
    </div>
    <h3 class="font-display text-2xl font-extrabold" data-i18n="qr.title">Welkom! Uw gratis inspectie wacht.</h3>
    <p class="mt-3 text-sm text-neutral" data-i18n="qr.body">Bedankt voor het scannen van onze kaart. Claim nu een <strong class="text-white">gratis inspectie &amp; offerte op locatie</strong> — geheel vrijblijvend.</p>
    <div class="mt-6 flex flex-col gap-3">
      <a href="https://wa.me/31684954212?text=Ik%20kom%20via%20het%20visitekaartje%20en%20wil%20graag%20een%20gratis%20inspectie" class="inline-flex items-center justify-center gap-2 rounded-lg bg-crimson px-5 py-3 font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow">
        <i data-lucide="message-circle" class="h-5 w-5"></i>
        <span data-i18n="qr.cta">Claim gratis inspectie</span>
      </a>
      <button onclick="closeQR(); scrollToId('assistant')" class="text-sm text-neutral underline underline-offset-4 hover:text-white" data-i18n="qr.alt">Of bereken eerst een indicatie →</button>
    </div>
  </div>
</div>
