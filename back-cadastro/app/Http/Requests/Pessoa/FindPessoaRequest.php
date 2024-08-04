<?php

namespace App\Http\Requests\Pessoa;

use Illuminate\Foundation\Http\FormRequest;

class FindPessoaRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $input = $this->all(); 

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
            'pesquisa' => ['max:100'],
        ];
    }
}
