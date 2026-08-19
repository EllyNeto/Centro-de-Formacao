<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $data = $view->getData();

            if (!isset($data['tabInicial'])) {
                $view->with('tabInicial', request()->is('cursos') ? 'cursos' : 'dashboard');
            }

            if (!isset($data['navItems'])) {
                $view->with('navItems', [
                    ['id' => 'dashboard',  'label' => 'Dashboard',  'subtitle' => 'Visão geral do centro'],
                    ['id' => 'cursos',     'label' => 'Cursos',     'subtitle' => 'Catálogo de cursos ministrados'],
                    ['id' => 'turmas',     'label' => 'Turmas',     'subtitle' => 'Organização de turmas e horários'],
                    ['id' => 'docentes',   'label' => 'Docentes',   'subtitle' => 'Corpo de formadores'],
                    ['id' => 'inscricoes', 'label' => 'Inscrições', 'subtitle' => 'Candidaturas a novos cursos'],
                    ['id' => 'alunos',     'label' => 'Alunos',     'subtitle' => 'Formandos matriculados'],
                    ['id' => 'financas',   'label' => 'Finanças',   'subtitle' => 'Propinas e pagamentos'],
                    ['id' => 'relatorios', 'label' => 'Relatórios', 'subtitle' => 'Indicadores e exportações'],
                ]);
            }

            if (!isset($data['kpis'])) {
                $view->with('kpis', [
                    ['label' => 'Formandos activos', 'value' => '812',  'trend' => '+38 este trimestre', 'trendUp' => true],
                    ['label' => 'Turmas em curso',    'value' => '4',   'trend' => '4 a iniciar em Set.', 'trendUp' => true],
                    ['label' => 'Taxa de ocupação',   'value' => '80%',  'trend' => '+5% face ao trimestre anterior', 'trendUp' => true],
                    ['label' => 'Inadimplência',      'value' => '12,6%', 'trend' => '+1,2% — acima da meta', 'trendUp' => false],
                ]);
            }

            if (!isset($data['ocupacaoAreas'])) {
                $view->with('ocupacaoAreas', [
                    ['nome' => 'Tecnologias de Informação',   'ocupadas' => 210, 'vagas' => 240],
                    ['nome' => 'Electricidade e Mecatrónica', 'ocupadas' => 168, 'vagas' => 200],
                    ['nome' => 'Mecânica e Produção',         'ocupadas' => 140, 'vagas' => 180],
                    ['nome' => 'Metrologia',                  'ocupadas' => 54,  'vagas' => 90],
                    ['nome' => 'Energias Renováveis',         'ocupadas' => 76,  'vagas' => 100],
                ]);
            }

            if (!isset($data['cursos'])) {
                $view->with('cursos', [
                    ['codigo' => 'TIC-204', 'nome' => 'Redes e Infraestruturas de TI', 'area' => 'Tecnologias de Informação',   'nivel' => 'Técnico',        'duracao' => '9 meses', 'turmasAtivas' => 3],
                    ['codigo' => 'ELM-118', 'nome' => 'Electricidade Industrial',      'area' => 'Electricidade e Mecatrónica', 'nivel' => 'Técnico',        'duracao' => '6 meses', 'turmasAtivas' => 2],
                    ['codigo' => 'MPR-072', 'nome' => 'Soldagem e Caldeiraria',        'area' => 'Mecânica e Produção',         'nivel' => 'Qualificação',   'duracao' => '4 meses', 'turmasAtivas' => 2],
                    ['codigo' => 'MET-031', 'nome' => 'Metrologia Dimensional',        'area' => 'Metrologia',                  'nivel' => 'Aperfeiçoamento', 'duracao' => '3 meses', 'turmasAtivas' => 1],
                    ['codigo' => 'ENR-055', 'nome' => 'Sistemas Fotovoltaicos',        'area' => 'Energias Renováveis',         'nivel' => 'Técnico',        'duracao' => '6 meses', 'turmasAtivas' => 2],
                    ['codigo' => 'EMP-009', 'nome' => 'Empreendedorismo e Gestão',     'area' => 'Empreendedorismo',            'nivel' => 'Aperfeiçoamento', 'duracao' => '2 meses', 'turmasAtivas' => 1],
                ]);
            }

            if (!isset($data['turmas'])) {
                $view->with('turmas', []);
            }
            if (!isset($data['docentes'])) {
                $view->with('docentes', []);
            }
            if (!isset($data['inscricoes'])) {
                $view->with('inscricoes', []);
            }
            if (!isset($data['alunos'])) {
                $view->with('alunos', []);
            }
            if (!isset($data['pagamentos'])) {
                $view->with('pagamentos', []);
            }
        });
    }
}
