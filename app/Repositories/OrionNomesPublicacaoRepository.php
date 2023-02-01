<?php

namespace App\Repositories;

use App\Models\OrionNomesPublicacao;
use App\Repositories\BaseRepository;

class OrionNomesPublicacaoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'codigo',
        'pf',
        'tipo',
        'oab',
        'uf',
        'cpf',
        'nome',
        'dj',
        'quem_recebe',
        'status',
        'possui_homonimo',
        'permissoes_usuarios',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return OrionNomesPublicacao::class;
    }
}
