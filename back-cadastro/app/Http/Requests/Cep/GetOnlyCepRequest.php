<?php

namespace App\Http\Requests\Cep;

use Illuminate\Foundation\Http\FormRequest;

class GetOnlyCepRequest extends FormRequest
{

    /**
     * @return void
     */
    public function prepareForValidation()
    {
        $input = $this->all();
        $input['cep'] = $this->route('cep');
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
            'cep' => ['required']
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
          'cep' => [
              'required' => 'O campo cep é requerido',
          ]
        ];
    }
}
