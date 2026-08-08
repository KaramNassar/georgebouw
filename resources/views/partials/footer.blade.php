<!-- Floating WhatsApp -->
<a href="https://wa.me/31684954212" class="fixed bottom-5 right-5 z-40 inline-flex items-center gap-2 rounded-full bg-crimson px-4 py-3 font-semibold text-white shadow-lg transition hover:bg-crimson2 hover:crimson-glow">
  <i data-lucide="message-circle" class="h-5 w-5"></i><span class="hidden sm:inline text-sm">{{ __('messages.float.wa') }}</span>
</a>
<footer class="border-t border-white/5 bg-charcoal py-10">
  <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-4 sm:flex-row sm:px-6">
    <a href="{{ url('/') }}" class="flex items-center gap-3">
      <img alt="GEORGE BOUW Logo" class="h-8 w-auto" src="{{ asset('images/logo.png') }}"/>
      <span><span class="block font-display text-sm font-extrabold">GEORGE BOUW</span><span class="block text-[10px] font-semibold uppercase tracking-[0.25em] text-crimson2">{{ __('messages.foot.tag') }}</span></span>
    </a>
    <p class="text-xs text-neutral">© 2026 GEORGE BOUW</p>
  </div>
</footer>
