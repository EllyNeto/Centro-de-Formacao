<div x-show="modalDocente" x-cloak class="fixed inset-0 bg-ink/60 flex items-center justify-center z-50 p-4" @click.self="modalDocente=false">
  <div class="bg-card rounded-xl w-full max-w-md p-6">
    <h3 class="font-display font-semibold text-lg mb-4">Novo docente</h3>
    <form @submit.prevent="modalDocente=false" class="space-y-3 text-sm">
      <div>
        <label class="text-xs font-medium text-slate2">Nome completo</label>
        <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="ex.: João Baptista">
      </div>
      <div>
        <label class="text-xs font-medium text-slate2">Especialidade</label>
        <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="ex.: Redes e Telecomunicações">
      </div>
      <div>
        <label class="text-xs font-medium text-slate2">Contacto</label>
        <input class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="+244 9__ ___ ___">
      </div>
      <div class="flex justify-end gap-2 pt-2">
        <button type="button" @click="modalDocente=false" class="px-4 py-2 text-sm rounded-lg text-slate2 hover:bg-surface">Cancelar</button>
        <button type="submit" class="px-4 py-2 text-sm rounded-lg bg-ink text-white font-semibold hover:bg-ink2">Guardar docente</button>
      </div>
    </form>
  </div>
</div>
