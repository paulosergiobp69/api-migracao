<?php

namespace Tests\Repositories;

use App\Models\tabelaDeTeste;
use App\Repositories\tabelaDeTesteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tabelaDeTesteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected tabelaDeTesteRepository $tabelaDeTesteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tabelaDeTesteRepo = app(tabelaDeTesteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->make()->toArray();

        $createdtabelaDeTeste = $this->tabelaDeTesteRepo->create($tabelaDeTeste);

        $createdtabelaDeTeste = $createdtabelaDeTeste->toArray();
        $this->assertArrayHasKey('id', $createdtabelaDeTeste);
        $this->assertNotNull($createdtabelaDeTeste['id'], 'Created tabelaDeTeste must have id specified');
        $this->assertNotNull(tabelaDeTeste::find($createdtabelaDeTeste['id']), 'tabelaDeTeste with given id must be in DB');
        $this->assertModelData($tabelaDeTeste, $createdtabelaDeTeste);
    }

    /**
     * @test read
     */
    public function test_read_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->create();

        $dbtabelaDeTeste = $this->tabelaDeTesteRepo->find($tabelaDeTeste->id);

        $dbtabelaDeTeste = $dbtabelaDeTeste->toArray();
        $this->assertModelData($tabelaDeTeste->toArray(), $dbtabelaDeTeste);
    }

    /**
     * @test update
     */
    public function test_update_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->create();
        $faketabelaDeTeste = tabelaDeTeste::factory()->make()->toArray();

        $updatedtabelaDeTeste = $this->tabelaDeTesteRepo->update($faketabelaDeTeste, $tabelaDeTeste->id);

        $this->assertModelData($faketabelaDeTeste, $updatedtabelaDeTeste->toArray());
        $dbtabelaDeTeste = $this->tabelaDeTesteRepo->find($tabelaDeTeste->id);
        $this->assertModelData($faketabelaDeTeste, $dbtabelaDeTeste->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tabela_de_teste()
    {
        $tabelaDeTeste = tabelaDeTeste::factory()->create();

        $resp = $this->tabelaDeTesteRepo->delete($tabelaDeTeste->id);

        $this->assertTrue($resp);
        $this->assertNull(tabelaDeTeste::find($tabelaDeTeste->id), 'tabelaDeTeste should not exist in DB');
    }
}
