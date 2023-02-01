<?php

namespace Database\Factories;

use App\Models\tabelaDeTeste;
use Illuminate\Database\Eloquent\Factories\Factory;


class tabelaDeTesteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tabelaDeTeste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nome' => $this->faker->text($this->faker->numberBetween(5, 60)),
            'endereco' => $this->faker->text($this->faker->numberBetween(5, 60)),
            'data_inicial' => $this->faker->date('Y-m-d'),
            'situacao' => $this->faker->lexify('?????'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
