<section x-show="activeTab === 'cursos'">
  <div class="nameplate rounded-xl p-4 mb-5 flex items-center justify-between text-white">
    <div class="flex items-center gap-3">
      <span class="rivet"></span><span class="rivet"></span>
      <div>
        <p class="text-[11px] font-mono text-white/60 uppercase">Catálogo</p>
        <p class="font-display font-semibold">Cursos ministrados</p>
      </div>
    </div>
    <button @click="modalCurso = true" class="bg-amber text-ink text-sm font-semibold px-4 py-2 rounded-lg hover:bg-amberD hover:text-white transition-colors">+ Novo curso</button>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <template x-for="c in cursos" :key="c.codigo">
      <div class="bg-card border border-slate-200 rounded-xl p-4 flex flex-col">
        <div class="flex items-start justify-between">
          <span class="font-mono text-[11px] px-2 py-0.5 rounded bg-ink text-white" x-text="c.codigo"></span>
          <span class="text-[11px] font-mono px-2 py-0.5 rounded-full"
                :class="c.nivel === 'Técnico' ? 'bg-amber/15 text-amberD' : 'bg-slate-100 text-slate2'"
                x-text="c.nivel"></span>
        </div>
        <h4 class="font-display font-semibold mt-3" x-text="c.nome"></h4>
        <p class="text-xs text-slate2 mt-1" x-text="c.area"></p>
        <div class="mt-3 flex items-center justify-between text-xs text-slate2">
          <span x-text="c.duracao"></span>
          <span class="font-mono" x-text="c.turmasAtivas + ' turma(s) activa(s)'"></span>
        </div>
        <button @click="activeTab='turmas'" class="mt-4 text-xs font-semibold text-ink hover:text-amberD self-start">Ver turmas →</button>
      </div>
    </template>
  </div>

  @include('modais.curso')
</section>
