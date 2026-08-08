@php $isHome = request()->is('/'); @endphp

<header id="nav" class="fixed inset-x-0 top-0 z-50 border-b border-white/5 bg-ink/70 backdrop-blur-lg transition-all">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6">
    <!-- Logo -->
    <a href="{{ $isHome ? '#top' : url('/') }}" class="flex items-center gap-3">
      <span class="grid h-11 w-11 place-items-center rounded-lg border border-crimson/40 bg-charcoal font-display text-lg font-black text-white shadow-[inset_0_0_16px_rgba(220,38,38,0.25)]">
        <span class="text-crimson2">G</span>B
      </span>
      <span class="leading-none">
        <span class="block font-display text-base font-extrabold tracking-wide">GEORGE BOUW</span>
        <span class="block text-[11px] font-semibold uppercase tracking-[0.25em] text-crimson2">Construction</span>
      </span>
    </a>

    <!-- Desktop links -->
    <nav class="hidden items-center gap-8 lg:flex">
      @unless($isHome)
        <a href="{{ url('/') }}" class="text-sm font-medium text-neutral transition hover:text-white" data-i18n="nav.home">Home</a>
      @endunless
      <a href="{{ $isHome ? '#services' : url('/').'#services' }}" class="text-sm font-medium text-neutral transition hover:text-white" data-i18n="nav.services">Diensten</a>
      @if($isHome)
        <a href="#assistant" class="text-sm font-medium text-neutral transition hover:text-white" data-i18n="nav.assistant">Kostenassistent</a>
      @endif
      <a href="{{ $isHome ? '#portfolio' : url('/').'#portfolio' }}" class="text-sm font-medium text-neutral transition hover:text-white" data-i18n="nav.portfolio">Projecten</a>
      @if($isHome)
        <a href="#process" class="text-sm font-medium text-neutral transition hover:text-white" data-i18n="nav.process">Werkwijze</a>
        <a href="#reviews" class="text-sm font-medium text-neutral transition hover:text-white" data-i18n="nav.reviews">Reviews</a>
      @endif
      <a href="{{ $isHome ? '#contact' : url('/').'#contact' }}" class="text-sm font-medium text-neutral transition hover:text-white" data-i18n="nav.contact">Contact</a>
    </nav>

    <div class="flex items-center gap-3">
      <!-- Language switch -->
      <div class="flex items-center rounded-full border border-white/10 bg-charcoal p-0.5 text-xs font-bold">
        <button onclick="setLang('nl')" data-lang-btn="nl" class="rounded-full px-3 py-1.5 transition">NL</button>
        <button onclick="setLang('en')" data-lang-btn="en" class="rounded-full px-3 py-1.5 text-neutral transition">EN</button>
      </div>
      <a href="{{ $isHome ? '#assistant' : url('/').'#assistant' }}" class="hidden items-center gap-2 rounded-lg bg-crimson px-4 py-2 text-sm font-semibold text-white transition hover:bg-crimson2 hover:crimson-glow sm:inline-flex">
        <i data-lucide="calculator" class="h-4 w-4"></i>
        <span data-i18n="nav.quote">Offerte</span>
      </a>
      @if($isHome)
        <!-- Mobile menu button -->
        <button onclick="toggleMenu()" class="lg:hidden text-white" aria-label="Menu">
          <i data-lucide="menu" class="h-6 w-6"></i>
        </button>
      @endif
    </div>
  </div>

  @if($isHome)
    <!-- Mobile menu -->
    <div id="mobileMenu" class="hidden border-t border-white/5 bg-ink lg:hidden">
      <nav class="flex flex-col px-4 py-3">
        <a onclick="toggleMenu()" href="#services" class="border-b border-white/5 py-3 text-sm text-neutral" data-i18n="nav.services">Diensten</a>
        <a onclick="toggleMenu()" href="#assistant" class="border-b border-white/5 py-3 text-sm text-neutral" data-i18n="nav.assistant">Kostenassistent</a>
        <a onclick="toggleMenu()" href="#portfolio" class="border-b border-white/5 py-3 text-sm text-neutral" data-i18n="nav.portfolio">Projecten</a>
        <a onclick="toggleMenu()" href="#process" class="border-b border-white/5 py-3 text-sm text-neutral" data-i18n="nav.process">Werkwijze</a>
        <a onclick="toggleMenu()" href="#reviews" class="border-b border-white/5 py-3 text-sm text-neutral" data-i18n="nav.reviews">Reviews</a>
        <a onclick="toggleMenu()" href="#contact" class="py-3 text-sm text-neutral" data-i18n="nav.contact">Contact</a>
      </nav>
    </div>
  @endif
</header>
