<div x-show="modalCurso" x-cloak class="fixed inset-0 bg-ink/60 flex items-center justify-center z-50 p-4" @click.self="modalCurso=false">
  <div class="bg-card rounded-xl w-full max-w-md p-6">
    <h3 class="font-display font-semibold text-lg mb-4">Novo curso</h3>
    <form @submit.prevent="modalCurso=false" class="space-y-3 text-sm">
      <div>
        <label class="text-xs font-medium text-slate2">Nome do curso</label>
        <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="ex.: Electricidade Industrial">
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="text-xs font-medium text-slate2">Área</label>
          <select class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2">
            <option>Tecnologias de Informação</option>
            <option>Electricidade e Mecatrónica</option>
            <option>Mecânica e Produção</option>
            <option>Metrologia</option>
            <option>Energias Renováveis</option>
            <option>Empreendedorismo</option>
          </select>
        </div>
        <div>
          <label class="text-xs font-medium text-slate2">Nível</label>
          <select class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2">
            <option>Qualificação</option>
            <option>Técnico</option>
            <option>Aperfeiçoamento</option>
          </select>
        </div>
      </div>
      <div>
        <label class="text-xs font-medium text-slate2">Duração</label>
        <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="ex.: 6 meses">
      </div>
      <div class="flex justify-end gap-2 pt-2">
        <button type="button" @click="modalCurso=false" class="px-4 py-2 text-sm rounded-lg text-slate2 hover:bg-surface">Cancelar</button>
        <button type="submit" class="px-4 py-2 text-sm rounded-lg bg-ink text-white font-semibold hover:bg-ink2">Guardar curso</button>
      </div>
    </form>
  </div>
</div>
