<?php

namespace Database\Factories;

use App\Models\Contato;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class ContatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = UploadedFile::fake()->create('document.pdf', '400', 'application/pdf');

        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => $this->faker->phoneNumber,
            'mensagem' => $this->faker->paragraph,
            'arquivo' => $file,
            'ip' => $this->faker->localIpv4
        ];
    }
}
