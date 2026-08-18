<section x-show="activeTab === 'turmas'">
  <div class="nameplate rounded-xl p-4 mb-5 flex items-center justify-between text-white">
    <div class="flex items-center gap-3">
      <span class="rivet"></span><span class="rivet"></span>
      <div>
        <p class="text-[11px] font-mono text-white/60 uppercase">Organização</p>
        <p class="font-display font-semibold">Turmas</p>
      </div>
    </div>
    <button @click="modalTurma = true" class="bg-amber text-ink text-sm font-semibold px-4 py-2 rounded-lg hover:bg-amberD hover:text-white transition-colors">+ Nova turma</button>
  </div>

  <div class="bg-card border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-surface text-xs text-slate2 uppercase font-mono">
        <tr>
          <th class="text-left px-4 py-3">Turma</th>
          <th class="text-left px-4 py-3">Curso</th>
          <th class="text-left px-4 py-3">Docente</th>
          <th class="text-left px-4 py-3">Horário</th>
          <th class="text-left px-4 py-3">Ocupação</th>
          <th class="text-left px-4 py-3">Estado</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        <template x-for="t in turmas" :key="t.id">
          <tr class="hover:bg-surface/60">
            <td class="px-4 py-3 font-mono text-xs" x-text="t.id"></td>
            <td class="px-4 py-3 font-medium" x-text="t.curso"></td>
            <td class="px-4 py-3" x-text="t.docente"></td>
            <td class="px-4 py-3 text-slate2" x-text="t.horario"></td>
            <td class="px-4 py-3">
              <div class="w-24 h-1.5 bg-surface rounded-full overflow-hidden">
                <div class="h-full bg-amber" :style="'width:' + (t.ocupadas/t.capacidade*100) + '%'"></div>
              </div>
              <span class="text-[11px] text-slate2 font-mono" x-text="t.ocupadas + '/' + t.capacidade"></span>
            </td>
            <td class="px-4 py-3">
              <span class="text-[11px] font-mono px-2 py-0.5 rounded-full"
                    :class="t.estado === 'Em curso' ? 'bg-green/10 text-green' : 'bg-slate-100 text-slate2'"
                    x-text="t.estado"></span>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>

  @include('modais.turma')
</section>
