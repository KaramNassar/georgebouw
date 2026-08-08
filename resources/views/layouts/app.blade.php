<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'GEORGE BOUW Construction — Uw Partner In Bouw & Renovatie')</title>
  <meta name="description" content="@yield('description', 'GEORGE BOUW Construction — Vakmanschap, betrouwbaarheid en kwaliteit in detail. Van A tot Z verzorgd. Badkamers, keukens, elektra, loodgieterswerk, stucwerk, timmerwerk en tegelwerk.')" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />

  @stack('head')
</head>

<body class="bg-[#0D0D0E] text-white antialiased font-body selection:bg-[#DC2626]">

  @yield('before_nav')

  @include('partials.nav')

  @yield('content')

  @include('partials.footer')

  @yield('after_footer')

  @stack('scripts')
</body>
</html>
