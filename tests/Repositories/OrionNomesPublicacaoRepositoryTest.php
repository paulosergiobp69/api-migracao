<?php

namespace Tests\Repositories;

use App\Models\OrionNomesPublicacao;
use App\Repositories\OrionNomesPublicacaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OrionNomesPublicacaoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected OrionNomesPublicacaoRepository $orionNomesPublicacaoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->orionNomesPublicacaoRepo = app(OrionNomesPublicacaoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->make()->toArray();

        $createdOrionNomesPublicacao = $this->orionNomesPublicacaoRepo->create($orionNomesPublicacao);

        $createdOrionNomesPublicacao = $createdOrionNomesPublicacao->toArray();
        $this->assertArrayHasKey('id', $createdOrionNomesPublicacao);
        $this->assertNotNull($createdOrionNomesPublicacao['id'], 'Created OrionNomesPublicacao must have id specified');
        $this->assertNotNull(OrionNomesPublicacao::find($createdOrionNomesPublicacao['id']), 'OrionNomesPublicacao with given id must be in DB');
        $this->assertModelData($orionNomesPublicacao, $createdOrionNomesPublicacao);
    }

    /**
     * @test read
     */
    public function test_read_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->create();

        $dbOrionNomesPublicacao = $this->orionNomesPublicacaoRepo->find($orionNomesPublicacao->id);

        $dbOrionNomesPublicacao = $dbOrionNomesPublicacao->toArray();
        $this->assertModelData($orionNomesPublicacao->toArray(), $dbOrionNomesPublicacao);
    }

    /**
     * @test update
     */
    public function test_update_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->create();
        $fakeOrionNomesPublicacao = OrionNomesPublicacao::factory()->make()->toArray();

        $updatedOrionNomesPublicacao = $this->orionNomesPublicacaoRepo->update($fakeOrionNomesPublicacao, $orionNomesPublicacao->id);

        $this->assertModelData($fakeOrionNomesPublicacao, $updatedOrionNomesPublicacao->toArray());
        $dbOrionNomesPublicacao = $this->orionNomesPublicacaoRepo->find($orionNomesPublicacao->id);
        $this->assertModelData($fakeOrionNomesPublicacao, $dbOrionNomesPublicacao->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_orion_nomes_publicacao()
    {
        $orionNomesPublicacao = OrionNomesPublicacao::factory()->create();

        $resp = $this->orionNomesPublicacaoRepo->delete($orionNomesPublicacao->id);

        $this->assertTrue($resp);
        $this->assertNull(OrionNomesPublicacao::find($orionNomesPublicacao->id), 'OrionNomesPublicacao should not exist in DB');
    }
}
