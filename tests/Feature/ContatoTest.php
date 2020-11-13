<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contato;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ContatoTest extends TestCase
{
    use WithFaker, RefreshDatabase, DatabaseMigrations;

    protected function setUpFaker()
    {
        $this->faker = $this->makeFaker('pt_BR');
    }

    /** @test */
    public function verifica_envio_contato_retorno_ok()
    {

        $file = UploadedFile::fake()->create('document.pdf', '400', 'application/pdf');

        $dados = [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => $this->faker->phoneNumber,
            'mensagem' => $this->faker->paragraph,
            'arquivo' => $file

        ];
        
        $this->post('/api/contato/store', $dados)
                ->assertStatus(200);

        $createdArea = Contato::latest()->first();
        $this->assertDatabaseHas('contato', ['id'=> $createdArea->id ]);
    }
}
