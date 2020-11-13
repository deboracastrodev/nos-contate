<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|celular_com_ddd',
            'mensagem' => 'required',
            'arquivo' => 'required|file|max:500|mimes:pdf,doc,docx,odt,txt',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute não é válido.',
            'nome.max' => 'O campo :attribute pode ter no máximo :max caracteres.',
            'email.max' => 'O campo :attribute pode ter no máximo :max caracteres.',
            'celular_com_ddd' => 'O campo :attribute não é um celular válido.',
            'arquivo.max' => 'O :attribute é muito grande, deve ter no máximo :max KB.',
            'mimes' => 'O campo :attribute está com formato inválido.'
        ];
    }
}
