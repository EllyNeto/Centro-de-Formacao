<section x-show="activeTab === 'financas'">
  <div class="nameplate rounded-xl p-4 mb-5 flex items-center justify-between text-white">
    <div class="flex items-center gap-3">
      <span class="rivet"></span><span class="rivet"></span>
      <div>
        <p class="text-[11px] font-mono text-white/60 uppercase">Tesouraria</p>
        <p class="font-display font-semibold">Finanças &amp; Pagamentos</p>
      </div>
    </div>
    <button @click="modalPagamento = true" class="bg-amber text-ink text-sm font-semibold px-4 py-2 rounded-lg hover:bg-amberD hover:text-white transition-colors">+ Registar pagamento</button>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-5">
    <div class="bg-card rounded-xl border border-slate-200 p-4">
      <p class="text-xs text-slate2 font-mono uppercase">Recebido este mês</p>
      <p class="font-display text-2xl font-semibold mt-1 text-green">Kz 4.280.000</p>
    </div>
    <div class="bg-card rounded-xl border border-slate-200 p-4">
      <p class="text-xs text-slate2 font-mono uppercase">Em atraso</p>
      <p class="font-display text-2xl font-semibold mt-1 text-red">Kz 615.000</p>
    </div>
    <div class="bg-card rounded-xl border border-slate-200 p-4">
      <p class="text-xs text-slate2 font-mono uppercase">Propinas por cobrar</p>
      <p class="font-display text-2xl font-semibold mt-1">Kz 1.120.000</p>
    </div>
  </div>

  <div class="bg-card border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-surface text-xs text-slate2 uppercase font-mono">
        <tr>
          <th class="text-left px-4 py-3">Aluno</th>
          <th class="text-left px-4 py-3">Curso</th>
          <th class="text-left px-4 py-3">Valor</th>
          <th class="text-left px-4 py-3">Método</th>
          <th class="text-left px-4 py-3">Data</th>
          <th class="text-left px-4 py-3">Estado</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        <template x-for="p in pagamentos" :key="p.id">
          <tr class="hover:bg-surface/60">
            <td class="px-4 py-3 font-medium" x-text="p.aluno"></td>
            <td class="px-4 py-3 text-slate2" x-text="p.curso"></td>
            <td class="px-4 py-3 font-mono" x-text="p.valor"></td>
            <td class="px-4 py-3 text-slate2" x-text="p.metodo"></td>
            <td class="px-4 py-3 text-slate2 font-mono text-xs" x-text="p.data"></td>
            <td class="px-4 py-3">
              <span class="text-[11px] font-mono px-2 py-0.5 rounded-full"
                    :class="p.estado === 'Pago' ? 'bg-green/10 text-green' : 'bg-red/10 text-red'"
                    x-text="p.estado"></span>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>

  @include('modais.pagamento')
</section>
