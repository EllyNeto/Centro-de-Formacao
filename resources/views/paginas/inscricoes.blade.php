<section x-show="activeTab === 'inscricoes'">
  <div class="nameplate rounded-xl p-4 mb-5 flex items-center justify-between text-white">
    <div class="flex items-center gap-3">
      <span class="rivet"></span><span class="rivet"></span>
      <div>
        <p class="text-[11px] font-mono text-white/60 uppercase">Admissões</p>
        <p class="font-display font-semibold">Inscrições</p>
      </div>
    </div>
    <button @click="modalInscricao = true" class="bg-amber text-ink text-sm font-semibold px-4 py-2 rounded-lg hover:bg-amberD hover:text-white transition-colors">+ Nova inscrição</button>
  </div>

  <div class="bg-card border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-surface text-xs text-slate2 uppercase font-mono">
        <tr>
          <th class="text-left px-4 py-3">Candidato</th>
          <th class="text-left px-4 py-3">Curso pretendido</th>
          <th class="text-left px-4 py-3">Data</th>
          <th class="text-left px-4 py-3">Estado</th>
          <th class="text-left px-4 py-3">Acção</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        <template x-for="i in inscricoes" :key="i.id">
          <tr class="hover:bg-surface/60">
            <td class="px-4 py-3 font-medium" x-text="i.candidato"></td>
            <td class="px-4 py-3" x-text="i.curso"></td>
            <td class="px-4 py-3 text-slate2 font-mono text-xs" x-text="i.data"></td>
            <td class="px-4 py-3">
              <span class="text-[11px] font-mono px-2 py-0.5 rounded-full"
                    :class="{
                      'bg-amber/15 text-amberD': i.estado === 'Pendente',
                      'bg-green/10 text-green': i.estado === 'Aprovada',
                      'bg-red/10 text-red': i.estado === 'Rejeitada'
                    }" x-text="i.estado"></span>
            </td>
            <td class="px-4 py-3">
              <button @click="i.estado='Aprovada'" class="text-xs text-green font-semibold hover:underline mr-2">Aprovar</button>
              <button @click="i.estado='Rejeitada'" class="text-xs text-red font-semibold hover:underline">Rejeitar</button>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>

  @include('modais.inscricao')
</section>
