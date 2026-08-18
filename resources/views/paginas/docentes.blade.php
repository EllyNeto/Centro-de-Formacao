<section x-show="activeTab === 'docentes'">
  <div class="nameplate rounded-xl p-4 mb-5 flex items-center justify-between text-white">
    <div class="flex items-center gap-3">
      <span class="rivet"></span><span class="rivet"></span>
      <div>
        <p class="text-[11px] font-mono text-white/60 uppercase">Corpo docente</p>
        <p class="font-display font-semibold">Formadores</p>
      </div>
    </div>
    <button @click="modalDocente = true" class="bg-amber text-ink text-sm font-semibold px-4 py-2 rounded-lg hover:bg-amberD hover:text-white transition-colors">+ Novo docente</button>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <template x-for="d in docentes" :key="d.id">
      <div class="bg-card border border-slate-200 rounded-xl p-4">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-ink text-white flex items-center justify-center font-display text-sm font-semibold" x-text="d.iniciais"></div>
          <div>
            <p class="font-medium" x-text="d.nome"></p>
            <p class="text-xs text-slate2" x-text="d.especialidade"></p>
          </div>
        </div>
        <div class="mt-3 flex items-center justify-between text-xs">
          <span class="text-slate2 font-mono" x-text="d.contacto"></span>
          <span class="font-mono px-2 py-0.5 rounded-full bg-slate-100 text-slate2" x-text="d.turmas + ' turma(s)'"></span>
        </div>
      </div>
    </template>
  </div>

  @include('modais.docente')
</section>
