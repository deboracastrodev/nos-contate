<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contato;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;

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

        $file = UploadedFile::fake()->create('document.pdf', 'application/pdf')->size(400);

        $dados = [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => $this->faker->phoneNumber,
            'mensagem' => $this->faker->paragraph,
            'arquivo' => $file

        ];

        /**
         * valida rota de cadastro de contato, com todos parâmetros enviados via formulário
         */
        $this->post('/api/contato/store', $dados)
                ->assertStatus(200);

        /**
         * valida se o registro foi salvo na base de dados corretamente
         * Valida created_at
         */
        $createdArea = Contato::latest()->first();
        $this->assertDatabaseHas('contato', ['id'=> $createdArea->id ]);
    }

    /** @test */
    public function valida_campo_nome_obrigatorio()
    {
        $contato = Contato::factory()->make(['nome' => null]);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('nome');
    }

    /** @test */
    public function valida_campo_email_obrigatorio()
    {
        $contato = Contato::factory()->make(['email' => null]);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('email');
    }

    /** @test */
    public function valida_campo_telefone_obrigatorio()
    {
        $contato = Contato::factory()->make(['telefone' => null]);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('telefone');
    }

    /** @test */
    public function valida_campo_mensagem_obrigatorio()
    {
        $contato = Contato::factory()->make(['mensagem' => null]);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('mensagem');
    }

    /** @test */
    public function valida_campo_arquivo_obrigatorio()
    {
        $contato = Contato::factory()->make(['arquivo' => null]);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('arquivo');
    }

    /** @test */
    public function valida_campo_email_invalido()
    {
        $contato = Contato::factory()->make(['email' => 'abc@']);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('email');
    }

    /** @test */
    public function valida_campo_telefone_invalido()
    {
        $contato = Contato::factory()->make(['telefone' => '99111515']);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('telefone');
    }

    /** @test */
    public function valida_campo_arquivo_tamanho_maximo()
    {
        $file = UploadedFile::fake()->create('document.pdf', 'application/pdf')->size(501);

        $contato = Contato::factory()->make(['arquivo' => $file]);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('arquivo');
    }

    /** @test */
    public function valida_campo_arquivo_formato_invalido()
    {
        $file = UploadedFile::fake()->create('document.pdf', 'image/png')->size(501);

        $contato = Contato::factory()->make(['arquivo' => $file]);

        $this->post('/api/contato/store', $contato->toArray())
            ->assertStatus(302)
            ->assertSessionHasErrors('arquivo');
    }
}
