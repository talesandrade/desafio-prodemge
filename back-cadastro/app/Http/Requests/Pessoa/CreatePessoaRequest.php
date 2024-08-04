<?php

namespace App\Http\Requests\Pessoa;

use App\Models\Pessoa;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class CreatePessoaRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $input = $this->all();

        $isValidProducer = Pessoa::where('cpf', $input['cpf'])
            ->exists();
        
        if($isValidProducer)
            throw new Exception('CPF já cadastrado na nossa base de dados.');

        $this->replace($input);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'max:100'],
            'nome_social' => ['max:100'],
            'cpf' => ['max:14'],
            'nome_pai' => ['required','max:100'],
            'nome_mae' => ['required','max:100'],
            'telefone' => ['max:100'],
            'email' => ['max:100']
        ];
    }
}
