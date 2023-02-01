<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OrionNomesPublicacao;

class OrionNomesPublicacaoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/orion-nomes-publicacaos', $orionNomesPublicacao
        );

        $this->assertApiResponse($orionNomesPublicacao);
    }

    /**
     * @test
     */
    public function test_read_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/orion-nomes-publicacaos/'.$orionNomesPublicacao->id
        );

        $this->assertApiResponse($orionNomesPublicacao->toArray());
    }

    /**
     * @test
     */
    public function test_update_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->create();
        $editedOrionNomesPublicacao = OrionNomesPublicacao::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/orion-nomes-publicacaos/'.$orionNomesPublicacao->id,
            $editedOrionNomesPublicacao
        );

        $this->assertApiResponse($editedOrionNomesPublicacao);
    }

    /**
     * @test
     */
    public function test_delete_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/orion-nomes-publicacaos/'.$orionNomesPublicacao->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/orion-nomes-publicacaos/'.$orionNomesPublicacao->id
        );

        $this->response->assertStatus(404);
    }
}
