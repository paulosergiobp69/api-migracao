<?php

namespace Database\Factories;

use App\Models\OrionNomesPublicacao;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrionNomesPublicacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrionNomesPublicacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'codigo' => $this->faker->text($this->faker->numberBetween(5, 25)),
            'pf' => $this->faker->text($this->faker->numberBetween(5, 5)),
            'tipo' => $this->faker->text($this->faker->numberBetween(5, 9)),
            'oab' => $this->faker->text($this->faker->numberBetween(5, 10)),
            'uf' => $this->faker->lexify('?????'),
            'cpf' => $this->faker->text($this->faker->numberBetween(5, 15)),
            'nome' => $this->faker->text($this->faker->numberBetween(5, 20)),
            'dj' => $this->faker->text($this->faker->numberBetween(5, 30)),
            'quem_recebe' => $this->faker->text($this->faker->numberBetween(5, 25)),
            'status' => $this->faker->text($this->faker->numberBetween(5, 15)),
            'possui_homonimo' => $this->faker->text($this->faker->numberBetween(5, 5)),
            'permissoes_usuarios' => $this->faker->text($this->faker->numberBetween(5, 25)),
            'created_by' => $this->faker->word,
            'updated_by' => $this->faker->word,
            'deleted_by' => $this->faker->word,
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
