<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Testa se a rota principal (/) responde 200 OK com o controller Centro_de_Formacao.
     */
    public function testDashboardRootRouteReturns200()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Testa se a rota /dashboard responde 200 OK.
     */
    public function testDashboardExplicitRouteReturns200()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }

    /**
     * Testa se a rota /cursos responde 200 OK com view paginas.cursos.
     */
    public function testCursosRouteReturns200()
    {
        $response = $this->get('/cursos');
        $response->assertStatus(200);
        $response->assertSee('Cursos Ministrados');
    }

    /**
     * Testa se rotas não registadas (ex.: /turmas, /docentes, /alunos, etc.) retornam 404 Not Found.
     */
    public function testUnmappedRoutesReturn404()
    {
        $routes = ['/turmas', '/docentes', '/inscricoes', '/alunos', '/financas', '/relatorios', '/nao-existe'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(404);
        }
    }
}
