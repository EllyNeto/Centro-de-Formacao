<section x-show="activeTab === 'relatorios'">
  <div class="nameplate rounded-xl p-4 mb-5 flex items-center gap-3 text-white">
    <span class="rivet"></span><span class="rivet"></span>
    <div>
      <p class="text-[11px] font-mono text-white/60 uppercase">Indicadores</p>
      <p class="font-display font-semibold">Relatórios</p>
    </div>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-card border border-slate-200 rounded-xl p-5">
      <p class="font-display font-semibold">Taxa de conclusão</p>
      <p class="text-xs text-slate2 mt-1">Formandos que concluíram o curso no prazo previsto, por trimestre.</p>
      <button class="mt-4 text-xs font-semibold text-ink hover:text-amberD">Exportar PDF →</button>
    </div>
    <div class="bg-card border border-slate-200 rounded-xl p-5">
      <p class="font-display font-semibold">Ocupação de turmas</p>
      <p class="text-xs text-slate2 mt-1">Comparação entre vagas abertas e vagas preenchidas por área.</p>
      <button class="mt-4 text-xs font-semibold text-ink hover:text-amberD">Exportar PDF →</button>
    </div>
    <div class="bg-card border border-slate-200 rounded-xl p-5">
      <p class="font-display font-semibold">Receita vs. inadimplência</p>
      <p class="text-xs text-slate2 mt-1">Evolução mensal de propinas cobradas face aos valores em atraso.</p>
      <button class="mt-4 text-xs font-semibold text-ink hover:text-amberD">Exportar PDF →</button>
    </div>
  </div>
</section>
