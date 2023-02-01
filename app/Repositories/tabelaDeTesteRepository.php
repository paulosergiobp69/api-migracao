<?php

namespace App\Repositories;

use App\Models\tabelaDeTeste;
use App\Repositories\BaseRepository;

class tabelaDeTesteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nome',
        'endereco',
        'data_inicial',
        'situacao'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return tabelaDeTeste::class;
    }
}
