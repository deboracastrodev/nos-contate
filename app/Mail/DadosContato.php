<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contato;

class DadosContato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contato $contato)
    {
        $this->contato = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.dados_contato')
                ->with([
                    'nome' => $this->contato->nome,
                    'email' => $this->contato->email,
                    'telefone' => $this->contato->telefone,
                    'ip' => $this->contato->ip,
                    'mensagem' => $this->contato->mensagem,
                ])
                ->attachFromStorage($this->contato->arquivo);
    }
}
