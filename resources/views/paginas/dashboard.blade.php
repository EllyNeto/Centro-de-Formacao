<section x-show="'dashboard'">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <template x-for="kpi in kpis" :key="kpi.label">
      <div class="bg-card rounded-xl border border-slate-200 p-4">
        <p class="text-xs text-slate2 font-mono uppercase tracking-wide" x-text="kpi.label"></p>
        <p class="font-display text-2xl font-semibold mt-1" x-text="kpi.value"></p>
        <p class="text-xs mt-1" :class="kpi.trendUp ? 'text-green' : 'text-red'" x-text="kpi.trend"></p>
      </div>
    </template>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-6">
    <div class="lg:col-span-2 bg-card rounded-xl border border-slate-200 p-5">
      <h3 class="font-display font-semibold mb-4">Ocupação por área de formação</h3>
      <div class="space-y-3">
        <template x-for="area in ocupacaoAreas" :key="area.nome">
          <div>
            <div class="flex justify-between text-xs mb-1">
              <span class="font-medium" x-text="area.nome"></span>
              <span class="text-slate2 font-mono" x-text="area.ocupadas + '/' + area.vagas + ' vagas'"></span>
            </div>
            <div class="w-full h-2 bg-surface rounded-full overflow-hidden">
              <div class="h-full bg-amber rounded-full" :style="'width:' + (area.ocupadas/area.vagas*100) + '%'"></div>
            </div>
          </div>
        </template>
      </div>
    </div>

    <div class="bg-card rounded-xl border border-slate-200 p-5">
      <h3 class="font-display font-semibold mb-4">Próximas inscrições a validar</h3>
      <ul class="space-y-3">
        <template x-for="i in inscricoes.slice(0,4)" :key="i.id">
          <li class="flex items-center justify-between text-sm">
            <div>
              <p class="font-medium" x-text="i.candidato"></p>
              <p class="text-xs text-slate2" x-text="i.curso"></p>
            </div>
            <span class="text-[11px] font-mono px-2 py-0.5 rounded-full"
                  :class="i.estado === 'Pendente' ? 'bg-amber/15 text-amberD' : 'bg-green/10 text-green'"
                  x-text="i.estado"></span>
          </li>
        </template>
      </ul>
      <a href="/inscricoes" class="mt-4 inline-block text-xs font-semibold text-ink hover:text-amberD">Ver todas as inscrições →</a>
    </div>
  </div>
</section>

