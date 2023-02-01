<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrionNomesPublicacao;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrionNomesPublicacaoImport;

class OrionNomesPublicacaoController extends Controller
{
    //
    public function getImport(){
        Excel::import(new OrionNomesPublicacaoImport, storage_path('teste\nomes_publicacao.xlsx'));
    }
}
