<!DOCTYPE html>
<html lang="pt-AO">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('titulo', 'Painel de Gestão — Centro de Formação')</title>

<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">

<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          ink:    '#0F1B2D',
          ink2:   '#16273F',
          surface:'#F6F7F9',
          card:   '#FFFFFF',
          amber:  '#E8A33D',
          amberD: '#C6832A',
          green:  '#2F7D5A',
          red:    '#C4453D',
          slate2: '#5B6B7A',
        },
        fontFamily: {
          display: ['"Space Grotesk"', 'sans-serif'],
          body: ['Inter', 'sans-serif'],
          mono: ['"IBM Plex Mono"', 'monospace'],
        }
      }
    }
  }
</script>

<link rel="stylesheet" href="{{ asset('css/painel.css') }}">
</head>

<body class="bg-surface text-[#16202B] antialiased">

<div x-data="painel()" x-cloak class="flex h-screen overflow-hidden">

  @include('partials.sidebar')

  <div class="flex-1 flex flex-col min-w-0">

    @include('partials.topbar')

    <main class="flex-1 overflow-y-auto p-6 space-y-6">
      @yield('conteudo')
    </main>
  </div>
</div>

<script>
  window.PAINEL_DATA = {
    tabInicial: @json($tabInicial),
    navItems: @json($navItems),
    kpis: @json($kpis),
    ocupacaoAreas: @json($ocupacaoAreas),
    cursos: @json($cursos),
    turmas: @json($turmas),
    docentes: @json($docentes),
    inscricoes: @json($inscricoes),
    alunos: @json($alunos),
    pagamentos: @json($pagamentos),
  };
</script>
<script src="{{ asset('js/painel.js') }}"></script>
</body>
</html>
