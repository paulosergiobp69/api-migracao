<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="OrionNomesPublicacao",
 *      required={},
 *      @OA\Property(
 *          property="codigo",
 *          description="codigo",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="pf",
 *          description="pf",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="tipo",
 *          description="tipo publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="oab",
 *          description="oab publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="uf",
 *          description="uf publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="cpf",
 *          description="cpf publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="nome",
 *          description="nome publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="dj",
 *          description="dj publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="quem_recebe",
 *          description="quem recebe",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="status",
 *          description="status publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="possui_homonimo",
 *          description="Possui homônimo publicacao",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="deleted_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class OrionNomesPublicacao extends Model
{
    use HasFactory;    public $table = 'orion1_nomes_publicacao';

    public $fillable = [
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
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'codigo' => 'string',
        'pf' => 'string',
        'tipo' => 'string',
        'oab' => 'string',
        'uf' => 'string',
        'cpf' => 'string',
        'nome' => 'string',
        'dj' => 'string',
        'quem_recebe' => 'string',
        'status' => 'string',
        'possui_homonimo' => 'string'
    ];

    public static array $rules = [
        'codigo' => 'nullable|string|max:25',
        'pf' => 'nullable|string|max:5',
        'tipo' => 'nullable|string|max:10',
        'oab' => 'nullable|string|max:10',
        'uf' => 'nullable|string|max:2',
        'cpf' => 'nullable|string|max:15',
        'nome' => 'nullable|string|max:20',
        'dj' => 'nullable|string|max:30',
        'quem_recebe' => 'nullable|string|max:25',
        'status' => 'nullable|string|max:15',
        'possui_homonimo' => 'nullable|string|max:5',
        'created_by' => 'nullable',
        'updated_by' => 'nullable',
        'deleted_by' => 'nullable',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
