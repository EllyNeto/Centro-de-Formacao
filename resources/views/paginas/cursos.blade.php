@extends('layouts.app')

@section('titulo', 'Cursos — Centro de Formação')

@section('conteudo')
<section x-show="activeTab === 'cursos'" class="space-y-6">

  <!-- Header Banner (Chapa Técnica) -->
  <div class="nameplate rounded-xl p-5 shadow-lg text-white flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div class="flex items-center gap-3">
      <div class="flex flex-col gap-1.5">
        <span class="rivet"></span>
        <span class="rivet"></span>
      </div>
      <div>
        <p class="text-[11px] font-mono text-amber tracking-widest uppercase">Catálogo Geral</p>
        <h2 class="font-display text-xl font-bold">Cursos Ministrados</h2>
        <p class="text-xs text-white/60 mt-0.5">Gestão de qualificações, programas técnicos e aperfeiçoamento profissional</p>
      </div>
    </div>
    <button @click="modalCurso = true"
            class="bg-amber text-ink text-sm font-semibold px-4 py-2.5 rounded-lg hover:bg-amberD hover:text-white transition-all shadow-md flex items-center justify-center gap-2 shrink-0">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
      </svg>
      Novo Curso
    </button>
  </div>

  <!-- Barra de Estatísticas Rápidas da Aba -->
  <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
    <div class="cursos-stat-card">
      <div class="cursos-stat-icon">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
      </div>
      <div>
        <p class="text-xs text-slate2 font-mono">Total Cursos</p>
        <p class="font-display text-lg font-bold" x-text="cursos.length"></p>
      </div>
    </div>

    <div class="cursos-stat-card">
      <div class="cursos-stat-icon !bg-green/10 !text-green">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </div>
      <div>
        <p class="text-xs text-slate2 font-mono">Turmas Activas</p>
        <p class="font-display text-lg font-bold" x-text="cursos.reduce((a, b) => a + (b.turmasAtivas || 0), 0)"></p>
      </div>
    </div>

    <div class="cursos-stat-card">
      <div class="cursos-stat-icon !bg-amber/15 !text-amberD">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
        </svg>
      </div>
      <div>
        <p class="text-xs text-slate2 font-mono">Nível Técnico</p>
        <p class="font-display text-lg font-bold" x-text="cursos.filter(c => c.nivel === 'Técnico').length"></p>
      </div>
    </div>

    <div class="cursos-stat-card">
      <div class="cursos-stat-icon !bg-indigo-50 !text-indigo-600">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
        </svg>
      </div>
      <div>
        <p class="text-xs text-slate2 font-mono">Especializações</p>
        <p class="font-display text-lg font-bold" x-text="cursos.filter(c => c.nivel === 'Aperfeiçoamento' || c.nivel === 'Qualificação').length"></p>
      </div>
    </div>
  </div>

  <!-- Toolbar de Pesquisa e Filtros -->
  <div class="bg-card border border-slate-200 rounded-xl p-4 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4 shadow-sm">
    <!-- Search Input -->
    <div class="relative flex-1 max-w-md">
      <input type="text"
             x-model="cursoPesquisa"
             placeholder="Pesquisar por nome, código ou área..."
             class="w-full text-sm bg-surface border border-slate-200 rounded-lg pl-9 pr-8 py-2 focus:outline-none focus:ring-2 focus:ring-amber/50">
      <svg class="w-4 h-4 absolute left-3 top-2.5 text-slate2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
      </svg>
      <button x-show="cursoPesquisa" @click="cursoPesquisa = ''" class="absolute right-2.5 top-2.5 text-slate2 hover:text-ink text-xs font-bold">✕</button>
    </div>

    <!-- Category Filters -->
    <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0">
      <button @click="cursoFiltroArea = 'Todas'"
              class="cursos-filter-pill"
              :class="cursoFiltroArea === 'Todas' ? 'active' : ''">Todas</button>
      <button @click="cursoFiltroArea = 'Tecnologias de Informação'"
              class="cursos-filter-pill"
              :class="cursoFiltroArea === 'Tecnologias de Informação' ? 'active' : ''">TI</button>
      <button @click="cursoFiltroArea = 'Electricidade e Mecatrónica'"
              class="cursos-filter-pill"
              :class="cursoFiltroArea === 'Electricidade e Mecatrónica' ? 'active' : ''">Electricidade</button>
      <button @click="cursoFiltroArea = 'Mecânica e Produção'"
              class="cursos-filter-pill"
              :class="cursoFiltroArea === 'Mecânica e Produção' ? 'active' : ''">Mecânica</button>
      <button @click="cursoFiltroArea = 'Energias Renováveis'"
              class="cursos-filter-pill"
              :class="cursoFiltroArea === 'Energias Renováveis' ? 'active' : ''">Energias</button>
      <button @click="cursoFiltroArea = 'Metrologia'"
              class="cursos-filter-pill"
              :class="cursoFiltroArea === 'Metrologia' ? 'active' : ''">Metrologia</button>
    </div>
  </div>

  <!-- Grid de Cards de Cursos -->
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
    <template x-for="c in cursosFiltrados" :key="c.codigo">
      <div class="curso-card animate-fade-in-up">
        <!-- Badge Top Bar -->
        <div class="flex items-center justify-between mb-3">
          <span class="curso-code-badge" x-text="c.codigo"></span>
          <span class="badge-nivel"
                :class="{
                  'badge-tecnico': c.nivel === 'Técnico',
                  'badge-qualificacao': c.nivel === 'Qualificação',
                  'badge-aperfeicoamento': c.nivel === 'Aperfeiçoamento'
                }">
            <span class="w-1.5 h-1.5 rounded-full"
                  :class="{
                    'bg-amberD': c.nivel === 'Técnico',
                    'bg-green': c.nivel === 'Qualificação',
                    'bg-indigo-600': c.nivel === 'Aperfeiçoamento'
                  }"></span>
            <span x-text="c.nivel"></span>
          </span>
        </div>

        <!-- Course Title -->
        <h3 class="font-display font-semibold text-base text-ink leading-snug group-hover:text-amberD transition-colors" x-text="c.nome"></h3>

        <!-- Area Tag -->
        <div class="mt-2.5">
          <span class="curso-area-badge">
            <svg class="w-3.5 h-3.5 text-slate2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
            <span x-text="c.area"></span>
          </span>
        </div>

        <!-- Info Divider -->
        <div class="my-4 border-t border-slate-100"></div>

        <!-- Course Details: Duração e Turmas Activas -->
        <div class="flex items-center justify-between text-xs text-slate2">
          <div class="flex items-center gap-1.5 font-medium">
            <svg class="w-4 h-4 text-amberD" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span x-text="c.duracao"></span>
          </div>

          <div class="status-pulse-container">
            <span class="status-pulse-dot"></span>
            <span class="font-mono text-ink font-semibold" x-text="c.turmasAtivas + ' turma(s)'"></span>
          </div>
        </div>

        <!-- Action Button -->
        <a href="/turmas" class="btn-ver-turmas">
          <span>Ver detalhes e turmas</span>
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
          </svg>
        </a>
      </div>
    </template>
  </div>

  <!-- Estado Vazio / Nenhum Curso Encontrado -->
  <div x-show="cursosFiltrados.length === 0"
       class="bg-card border border-dashed border-slate-300 rounded-xl p-10 text-center">
    <svg class="w-12 h-12 text-slate2 mx-auto mb-3 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    <h4 class="font-display font-semibold text-ink">Nenhum curso encontrado</h4>
    <p class="text-xs text-slate2 mt-1">Tente ajustar a sua pesquisa ou os filtros de área selecionados.</p>
    <button @click="cursoFiltroArea = 'Todas'; cursoPesquisa = ''" class="mt-4 text-xs font-semibold text-amberD hover:underline">Limpar filtros de pesquisa</button>
  </div>

  @include('modais.curso')
</section>
@endsection
