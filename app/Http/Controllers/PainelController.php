<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelController extends Controller
{
    /**
     * Mostra o painel de gestão do centro de formação.
     *
     * Os arrays abaixo estão como dados de demonstração — nesta fase
     * substituem-se pelos Models/Eloquent (Curso, Turma, Docente,
     * Inscricao, Aluno, Pagamento) quando a base de dados estiver ligada.
     * A estrutura foi mantida igual à do protótipo (preview.html) para
     * que o JSON passado ao Alpine (window.PAINEL_DATA) seja compatível
     * com o painel.js sem alterações.
     */
    public function index(Request $request, string $tab = 'dashboard')
    {
        $navItems = [
            ['id' => 'dashboard',  'label' => 'Dashboard',  'subtitle' => 'Visão geral do centro'],
            ['id' => 'cursos',     'label' => 'Cursos',     'subtitle' => 'Catálogo de cursos ministrados'],
            ['id' => 'turmas',     'label' => 'Turmas',     'subtitle' => 'Organização de turmas e horários'],
            ['id' => 'docentes',   'label' => 'Docentes',   'subtitle' => 'Corpo de formadores'],
            ['id' => 'inscricoes', 'label' => 'Inscrições', 'subtitle' => 'Candidaturas a novos cursos'],
            ['id' => 'alunos',     'label' => 'Alunos',     'subtitle' => 'Formandos matriculados'],
            ['id' => 'financas',   'label' => 'Finanças',   'subtitle' => 'Propinas e pagamentos'],
            ['id' => 'relatorios', 'label' => 'Relatórios', 'subtitle' => 'Indicadores e exportações'],
        ];

        $kpis = [
            ['label' => 'Formandos activos', 'value' => '812',  'trend' => '+38 este trimestre', 'trendUp' => true],
            ['label' => 'Turmas em curso',    'value' => '27',   'trend' => '4 a iniciar em Set.', 'trendUp' => true],
            ['label' => 'Taxa de ocupação',   'value' => '86%',  'trend' => '+5% face ao trimestre anterior', 'trendUp' => true],
            ['label' => 'Inadimplência',      'value' => '12,6%', 'trend' => '+1,2% — acima da meta', 'trendUp' => false],
        ];

        $ocupacaoAreas = [
            ['nome' => 'Tecnologias de Informação',   'ocupadas' => 210, 'vagas' => 240],
            ['nome' => 'Electricidade e Mecatrónica', 'ocupadas' => 168, 'vagas' => 200],
            ['nome' => 'Mecânica e Produção',         'ocupadas' => 140, 'vagas' => 180],
            ['nome' => 'Metrologia',                  'ocupadas' => 54,  'vagas' => 90],
            ['nome' => 'Energias Renováveis',         'ocupadas' => 76,  'vagas' => 100],
        ];

        $cursos = [
            ['codigo' => 'TIC-204', 'nome' => 'Redes e Infraestruturas de TI', 'area' => 'Tecnologias de Informação',   'nivel' => 'Técnico',        'duracao' => '9 meses', 'turmasAtivas' => 3],
            ['codigo' => 'ELM-118', 'nome' => 'Electricidade Industrial',      'area' => 'Electricidade e Mecatrónica', 'nivel' => 'Técnico',        'duracao' => '6 meses', 'turmasAtivas' => 2],
            ['codigo' => 'MPR-072', 'nome' => 'Soldagem e Caldeiraria',        'area' => 'Mecânica e Produção',         'nivel' => 'Qualificação',   'duracao' => '4 meses', 'turmasAtivas' => 2],
            ['codigo' => 'MET-031', 'nome' => 'Metrologia Dimensional',        'area' => 'Metrologia',                  'nivel' => 'Aperfeiçoamento', 'duracao' => '3 meses', 'turmasAtivas' => 1],
            ['codigo' => 'ENR-055', 'nome' => 'Sistemas Fotovoltaicos',        'area' => 'Energias Renováveis',         'nivel' => 'Técnico',        'duracao' => '6 meses', 'turmasAtivas' => 2],
            ['codigo' => 'EMP-009', 'nome' => 'Empreendedorismo e Gestão',     'area' => 'Empreendedorismo',            'nivel' => 'Aperfeiçoamento', 'duracao' => '2 meses', 'turmasAtivas' => 1],
        ];

        $turmas = [
            ['id' => 'T-TIC204-A', 'curso' => 'Redes e Infraestruturas de TI', 'docente' => 'João Baptista',     'horario' => 'Seg/Qua/Sex · 08h–12h', 'ocupadas' => 24, 'capacidade' => 25, 'estado' => 'Em curso'],
            ['id' => 'T-ELM118-B', 'curso' => 'Electricidade Industrial',      'docente' => 'Manuel Sacaia',     'horario' => 'Ter/Qui · 14h–18h',     'ocupadas' => 18, 'capacidade' => 20, 'estado' => 'Em curso'],
            ['id' => 'T-MPR072-A', 'curso' => 'Soldagem e Caldeiraria',        'docente' => 'Isabel Chindenga',  'horario' => 'Seg–Sex · 07h–11h',     'ocupadas' => 15, 'capacidade' => 18, 'estado' => 'A iniciar'],
            ['id' => 'T-ENR055-A', 'curso' => 'Sistemas Fotovoltaicos',        'docente' => 'Carlos Muatxinene', 'horario' => 'Sáb · 08h–17h',         'ocupadas' => 20, 'capacidade' => 22, 'estado' => 'Em curso'],
        ];

        $docentes = [
            ['id' => 1, 'nome' => 'João Baptista',     'especialidade' => 'Redes e Telecomunicações', 'contacto' => '+244 923 000 111', 'turmas' => 2, 'iniciais' => 'JB'],
            ['id' => 2, 'nome' => 'Manuel Sacaia',     'especialidade' => 'Instalações Eléctricas',   'contacto' => '+244 912 222 333', 'turmas' => 1, 'iniciais' => 'MS'],
            ['id' => 3, 'nome' => 'Isabel Chindenga',  'especialidade' => 'Soldagem Industrial',       'contacto' => '+244 934 444 555', 'turmas' => 1, 'iniciais' => 'IC'],
            ['id' => 4, 'nome' => 'Carlos Muatxinene', 'especialidade' => 'Energias Renováveis',       'contacto' => '+244 945 666 777', 'turmas' => 1, 'iniciais' => 'CM'],
        ];

        $inscricoes = [
            ['id' => 1, 'candidato' => 'Domingos Kiala', 'curso' => 'Redes e Infraestruturas de TI', 'data' => '05/08/2026', 'estado' => 'Pendente'],
            ['id' => 2, 'candidato' => 'Ana Paula Neto', 'curso' => 'Sistemas Fotovoltaicos',        'data' => '04/08/2026', 'estado' => 'Aprovada'],
            ['id' => 3, 'candidato' => 'Fernando Bumba', 'curso' => 'Soldagem e Caldeiraria',        'data' => '03/08/2026', 'estado' => 'Pendente'],
            ['id' => 4, 'candidato' => 'Marta Cassinda', 'curso' => 'Electricidade Industrial',      'data' => '01/08/2026', 'estado' => 'Rejeitada'],
            ['id' => 5, 'candidato' => 'Pedro Sumbo',    'curso' => 'Metrologia Dimensional',        'data' => '29/07/2026', 'estado' => 'Aprovada'],
        ];

        $alunos = [
            ['matricula' => 'CF-2026-0341', 'nome' => 'Domingos Kiala', 'turma' => 'T-TIC204-A', 'pagamento' => 'Em dia'],
            ['matricula' => 'CF-2026-0298', 'nome' => 'Ana Paula Neto', 'turma' => 'T-ENR055-A', 'pagamento' => 'Em dia'],
            ['matricula' => 'CF-2026-0255', 'nome' => 'Fernando Bumba', 'turma' => 'T-MPR072-A', 'pagamento' => 'Em atraso'],
            ['matricula' => 'CF-2026-0212', 'nome' => 'Marta Cassinda', 'turma' => 'T-ELM118-B', 'pagamento' => 'Em dia'],
        ];

        $pagamentos = [
            ['id' => 1, 'aluno' => 'Domingos Kiala', 'curso' => 'Redes e Infraestruturas de TI', 'valor' => 'Kz 45.000', 'metodo' => 'Multicaixa',     'data' => '05/08/2026', 'estado' => 'Pago'],
            ['id' => 2, 'aluno' => 'Ana Paula Neto', 'curso' => 'Sistemas Fotovoltaicos',        'valor' => 'Kz 38.000', 'metodo' => 'Transferência',  'data' => '03/08/2026', 'estado' => 'Pago'],
            ['id' => 3, 'aluno' => 'Fernando Bumba', 'curso' => 'Soldagem e Caldeiraria',        'valor' => 'Kz 30.000', 'metodo' => 'Numerário',      'data' => '20/07/2026', 'estado' => 'Em atraso'],
            ['id' => 4, 'aluno' => 'Marta Cassinda', 'curso' => 'Electricidade Industrial',      'valor' => 'Kz 42.000', 'metodo' => 'Multicaixa',     'data' => '01/08/2026', 'estado' => 'Pago'],
        ];

        return view('painel', [
            'tabInicial'    => $tab,
            'navItems'      => $navItems,
            'kpis'          => $kpis,
            'ocupacaoAreas' => $ocupacaoAreas,
            'cursos'        => $cursos,
            'turmas'        => $turmas,
            'docentes'      => $docentes,
            'inscricoes'    => $inscricoes,
            'alunos'        => $alunos,
            'pagamentos'    => $pagamentos,
        ]);
    }
}
