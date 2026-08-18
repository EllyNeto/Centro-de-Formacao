<div x-show="modalInscricao" x-cloak class="fixed inset-0 bg-ink/60 flex items-center justify-center z-50 p-4" @click.self="modalInscricao=false">
  <div class="bg-card rounded-xl w-full max-w-md p-6">
    <h3 class="font-display font-semibold text-lg mb-4">Nova inscrição</h3>
    <form @submit.prevent="modalInscricao=false" class="space-y-3 text-sm">
      <div>
        <label class="text-xs font-medium text-slate2">Nome do candidato</label>
        <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="Nome completo">
      </div>
      <div>
        <label class="text-xs font-medium text-slate2">Curso pretendido</label>
        <select class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2">
          <template x-for="c in cursos" :key="c.codigo"><option x-text="c.nome"></option></template>
        </select>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="text-xs font-medium text-slate2">Bilhete de Identidade</label>
          <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="00XXXXXXXXX000">
        </div>
        <div>
          <label class="text-xs font-medium text-slate2">Contacto</label>
          <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="+244 9__ ___ ___">
        </div>
      </div>
      <div class="flex justify-end gap-2 pt-2">
        <button type="button" @click="modalInscricao=false" class="px-4 py-2 text-sm rounded-lg text-slate2 hover:bg-surface">Cancelar</button>
        <button type="submit" class="px-4 py-2 text-sm rounded-lg bg-ink text-white font-semibold hover:bg-ink2">Registar inscrição</button>
      </div>
    </form>
  </div>
</div>
