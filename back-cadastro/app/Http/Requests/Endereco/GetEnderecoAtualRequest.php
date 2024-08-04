<?php

namespace App\Http\Requests\Endereco;

use App\Models\Pessoa;
use App\Models\Endereco;
use Exception;
use Illuminate\Foundation\Http\FormRequest;

class GetEnderecoAtualRequest extends FormRequest
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
            'pessoa_id' => ['required', 'max:11']
        ];
    }
}
