<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Contato;

class ContatoTest extends TestCase
{

    /** @test */
    public function valida_se_campos_do_contato_estao_corretos()
    {
        $contato = new Contato;

        $columns_expected = [
            'nome',
            'email',
            'telefone',
            'mensagem',
            'arquivo',
            'ip',
        ];

        $compare = array_diff($columns_expected, $contato->getFillable());

        $this->assertEquals(0, count($compare));
    }
}
