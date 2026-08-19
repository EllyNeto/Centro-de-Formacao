function painel() {
  const dados = window.PAINEL_DATA || {};

  const icones = {
    dashboard:  '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>',
    cursos:     '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg>',
    turmas:     '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>',
    docentes:   '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>',
    inscricoes: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>',
    alunos:     '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10L12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1.5 3 3 6 3s6-1.5 6-3v-5"/></svg>',
    financas:   '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M9 9.5c0-1.5 1.5-2 3-2s3 .8 3 2-1.5 1.8-3 2-3 .7-3 2 1.5 2 3 2 3-.5 3-2"/></svg>',
    relatorios: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><rect x="7" y="12" width="3" height="6"/><rect x="12" y="8" width="3" height="10"/><rect x="17" y="5" width="3" height="13"/></svg>',
  };

  return {
    activeTab: dados.tabInicial || 'dashboard',
    modalCurso: false,
    modalTurma: false,
    modalDocente: false,
    modalInscricao: false,
    modalPagamento: false,

    // Estado da Aba de Cursos
    cursoFiltroArea: 'Todas',
    cursoPesquisa: '',

    get cursosFiltrados() {
      return (this.cursos || []).filter(c => {
        const bateArea = this.cursoFiltroArea === 'Todas' || c.area === this.cursoFiltroArea;
        const q = (this.cursoPesquisa || '').toLowerCase().trim();
        const bateBusca = !q || c.nome.toLowerCase().includes(q) || c.codigo.toLowerCase().includes(q) || c.area.toLowerCase().includes(q);
        return bateArea && bateBusca;
      });
    },

    navItems: (dados.navItems || []).map(item => ({
      ...item,
      icon: icones[item.id] || '',
    })),

    get currentNav() {
      return this.navItems.find(n => n.id === this.activeTab) || this.navItems[0];
    },

    kpis: dados.kpis || [],
    ocupacaoAreas: dados.ocupacaoAreas || [],
    cursos: dados.cursos || [],
    turmas: dados.turmas || [],
    docentes: dados.docentes || [],
    inscricoes: dados.inscricoes || [],
    alunos: dados.alunos || [],
    pagamentos: dados.pagamentos || [],
  };
}
