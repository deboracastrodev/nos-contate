<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
    public function store(ContatoRequest $request)
    {
        $path = $request->file('arquivo')->store('arquivos');
        
        $contato = new Contato(
            [
                'nome' => $request->nome,
                'email' => $request->email,
                'telefone' => $request->telefone,
                'mensagem' => $request->mensagem,
                'arquivo' => $path,
                'ip' => $request->getClientIp()
            ]
        );

        $contato->save();

        return response()->json('Contato enviado com sucesso!');
    }
}
