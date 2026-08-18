<div x-show="modalTurma" x-cloak class="fixed inset-0 bg-ink/60 flex items-center justify-center z-50 p-4" @click.self="modalTurma=false">
  <div class="bg-card rounded-xl w-full max-w-md p-6">
    <h3 class="font-display font-semibold text-lg mb-4">Nova turma</h3>
    <form @submit.prevent="modalTurma=false" class="space-y-3 text-sm">
      <div>
        <label class="text-xs font-medium text-slate2">Curso associado</label>
        <select class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2">
          <template x-for="c in cursos" :key="c.codigo"><option x-text="c.nome"></option></template>
        </select>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="text-xs font-medium text-slate2">Docente</label>
          <select class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2">
            <template x-for="d in docentes" :key="d.id"><option x-text="d.nome"></option></template>
          </select>
        </div>
        <div>
          <label class="text-xs font-medium text-slate2">Capacidade</label>
          <input type="number" class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="25">
        </div>
      </div>
      <div>
        <label class="text-xs font-medium text-slate2">Horário</label>
        <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="Seg/Qua/Sex · 08h–12h">
      </div>
      <div class="flex justify-end gap-2 pt-2">
        <button type="button" @click="modalTurma=false" class="px-4 py-2 text-sm rounded-lg text-slate2 hover:bg-surface">Cancelar</button>
        <button type="submit" class="px-4 py-2 text-sm rounded-lg bg-ink text-white font-semibold hover:bg-ink2">Criar turma</button>
      </div>
    </form>
  </div>
</div>
