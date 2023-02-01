<?php

namespace App\Imports;

use App\Models\OrionNomesPublicacao;
use Maatwebsite\Excel\Concerns\ToModel;

class OrionNomesPublicacaoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

         //dd($row);
        if( $row[10] == 'Possui homônimo'){
            $row[10] = 'CAB';
        }

        return new OrionNomesPublicacao([
                //'id' => $row[0];
                'codigo'              => $row[0],
                'pf'                  => $row[1],
                'tipo'                => $row[2],
                'oab'                 => $row[3],
                'uf'                  => $row[4],
                'cpf'                 => $row[5],
                'nome'                => $row[6],
                'dj'                  => $row[7],
                'quem_recebe'         => $row[8],
                'status'              => $row[9],
                'possui_homonimo'     => $row[10],
        ]);
    }
}
