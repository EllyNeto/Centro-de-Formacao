<section x-show="activeTab === 'alunos'">
  <div class="nameplate rounded-xl p-4 mb-5 flex items-center gap-3 text-white">
    <span class="rivet"></span><span class="rivet"></span>
    <div>
      <p class="text-[11px] font-mono text-white/60 uppercase">Formandos</p>
      <p class="font-display font-semibold">Alunos matriculados</p>
    </div>
  </div>

  <div class="bg-card border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-surface text-xs text-slate2 uppercase font-mono">
        <tr>
          <th class="text-left px-4 py-3">Nº matrícula</th>
          <th class="text-left px-4 py-3">Nome</th>
          <th class="text-left px-4 py-3">Turma</th>
          <th class="text-left px-4 py-3">Pagamento</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        <template x-for="a in alunos" :key="a.matricula">
          <tr class="hover:bg-surface/60">
            <td class="px-4 py-3 font-mono text-xs" x-text="a.matricula"></td>
            <td class="px-4 py-3 font-medium" x-text="a.nome"></td>
            <td class="px-4 py-3 text-slate2" x-text="a.turma"></td>
            <td class="px-4 py-3">
              <span class="text-[11px] font-mono px-2 py-0.5 rounded-full"
                    :class="a.pagamento === 'Em dia' ? 'bg-green/10 text-green' : 'bg-red/10 text-red'"
                    x-text="a.pagamento"></span>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</section>
