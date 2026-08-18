<div x-show="modalPagamento" x-cloak class="fixed inset-0 bg-ink/60 flex items-center justify-center z-50 p-4" @click.self="modalPagamento=false">
  <div class="bg-card rounded-xl w-full max-w-md p-6">
    <h3 class="font-display font-semibold text-lg mb-4">Registar pagamento</h3>
    <form @submit.prevent="modalPagamento=false" class="space-y-3 text-sm">
      <div>
        <label class="text-xs font-medium text-slate2">Aluno</label>
        <select class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2">
          <template x-for="a in alunos" :key="a.matricula"><option x-text="a.nome"></option></template>
        </select>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="text-xs font-medium text-slate2">Valor (Kz)</label>
          <input type="number" class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2" placeholder="35000">
        </div>
        <div>
          <label class="text-xs font-medium text-slate2">Método</label>
          <select class="w-full mt-1 border border-slate-200 rounded-lg px-3 py-2">
            <option>Transferência</option>
            <option>Multicaixa</option>
            <option>Numerário</option>
          </select>
        </div>
      </div>
      <div class="flex justify-end gap-2 pt-2">
        <button type="button" @click="modalPagamento=false" class="px-4 py-2 text-sm rounded-lg text-slate2 hover:bg-surface">Cancelar</button>
        <button type="submit" class="px-4 py-2 text-sm rounded-lg bg-ink text-white font-semibold hover:bg-ink2">Confirmar pagamento</button>
      </div>
    </form>
  </div>
</div>
