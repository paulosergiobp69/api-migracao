<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="tabelaDeTeste",
 *      required={},
 *      @OA\Property(
 *          property="nome",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="endereco",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="data_inicial",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="situacao",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
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
 *      ),
 *      @OA\Property(
 *          property="deleted_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */class tabelaDeTeste extends Model
{
    use HasFactory;

    public $table = 'tabelaTest';

    public $fillable = [
        'nome',
        'endereco',
        'data_inicial',
        'situacao'
    ];

    protected $casts = [
        'nome' => 'string',
        'endereco' => 'string',
        'data_inicial' => 'date',
        'situacao' => 'string'
    ];

    public static array $rules = [
        'nome' => 'nullable|string|max:60',
        'endereco' => 'nullable|string|max:60',
        'data_inicial' => 'nullable',
        'situacao' => 'nullable|string|max:1',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
