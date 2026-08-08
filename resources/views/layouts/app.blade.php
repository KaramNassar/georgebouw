<!DOCTYPE html>
<html lang="nl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'GEORGE BOUW Construction — Uw Partner In Bouw & Renovatie')</title>
  <meta name="description" content="@yield('description', 'GEORGE BOUW Construction — Vakmanschap, betrouwbaarheid en kwaliteit in detail. Van A tot Z verzorgd. Badkamers, keukens, elektra, loodgieterswerk, stucwerk, timmerwerk en tegelwerk.')" />

  <!-- Tailwind CSS (CDN — swap for a compiled build when you add a bundler) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            // Base (60%)
            ink:      '#0D0D0E',
            charcoal: '#16171A',
            slate900: '#26272B',
            // Structure & text (30%)
            neutral:  '#9CA3AF',
            // Accent (10%)
            crimson:  '#DC2626',
            crimson2: '#EF4444',
          },
          fontFamily: {
            display: ['Archivo', 'system-ui', 'sans-serif'],
            body: ['Inter', 'system-ui', 'sans-serif'],
          },
          boxShadow: {
            glow: '0 0 0 1px rgba(220,38,38,0.25), 0 8px 40px rgba(220,38,38,0.15)',
          },
        },
      },
    };
  </script>

  <style>
    :root { --glow: rgba(220,38,38,0.15); }
    html { background:#0D0D0E; }
    body { font-family:'Inter',sans-serif; }
    h1,h2,h3,.font-display { font-family:'Archivo',sans-serif; letter-spacing:-0.02em; }

    /* subtle blueprint grid texture */
    .grid-bg {
      background-image:
        linear-gradient(to right, rgba(255,255,255,0.035) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255,255,255,0.035) 1px, transparent 1px);
      background-size: 46px 46px;
    }
    .crimson-glow { box-shadow: 0 10px 40px var(--glow); }
    .text-glow { text-shadow: 0 0 24px rgba(220,38,38,0.45); }

    /* reveal on scroll */
    .reveal { opacity:0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
    .reveal.in { opacity:1; transform: none; }

    /* before / after slider */
    .ba-wrap { position:relative; overflow:hidden; user-select:none; }
    .ba-after { position:absolute; inset:0; width:50%; overflow:hidden; border-right:2px solid #DC2626; }
    .ba-after img { width: 200%; max-width:none; height:100%; object-fit:cover; }
    .ba-handle { position:absolute; top:0; bottom:0; left:50%; width:40px; transform:translateX(-50%); cursor:ew-resize; display:flex; align-items:center; justify-content:center; }
    .ba-handle span { width:38px; height:38px; border-radius:9999px; background:#DC2626; display:flex; align-items:center; justify-content:center; box-shadow:0 0 0 4px rgba(220,38,38,0.25); }
    .ba-label { position:absolute; bottom:10px; font-size:11px; letter-spacing:.08em; text-transform:uppercase; padding:4px 10px; border-radius:4px; background:rgba(13,13,14,.72); backdrop-filter:blur(4px); }

    /* range input styling for slider */
    input[type=range].ba-range { position:absolute; inset:0; width:100%; height:100%; margin:0; opacity:0; cursor:ew-resize; z-index:10; }

    .wizard-dot { transition: all .3s ease; }
    ::selection { background:#DC2626; color:#fff; }
    /* hide scrollbar for filter row on mobile */
    .no-scrollbar::-webkit-scrollbar { display:none; }
    .no-scrollbar { -ms-overflow-style:none; scrollbar-width:none; }
  </style>

  @stack('head')
</head>

<body class="bg-ink text-white antialiased font-body selection:bg-crimson">

  @yield('before_nav')

  @include('partials.nav')

  @yield('content')

  @include('partials.footer')

  @yield('after_footer')

  @stack('scripts')
</body>
</html>
