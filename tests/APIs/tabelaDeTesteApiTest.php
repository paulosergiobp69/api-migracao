<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tabelaDeTeste;

class tabelaDeTesteApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tabela-de-testes', $tabelaDeTeste
        );

        $this->assertApiResponse($tabelaDeTeste);
    }

    /**
     * @test
     */
    public function test_read_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tabela-de-testes/'.$tabelaDeTeste->id
        );

        $this->assertApiResponse($tabelaDeTeste->toArray());
    }

    /**
     * @test
     */
    public function test_update_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->create();
        $editedtabelaDeTeste = tabelaDeTeste::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tabela-de-testes/'.$tabelaDeTeste->id,
            $editedtabelaDeTeste
        );

        $this->assertApiResponse($editedtabelaDeTeste);
    }

    /**
     * @test
     */
    public function test_delete_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tabela-de-testes/'.$tabelaDeTeste->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tabela-de-testes/'.$tabelaDeTeste->id
        );

        $this->response->assertStatus(404);
    }
}
