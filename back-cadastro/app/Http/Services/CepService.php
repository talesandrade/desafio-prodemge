<?php

namespace App\Http\Services;

use App\Helpers\Utils;
use Exception;

class CepService
{
    /**
     * @param array $data
     * @return array
     */
    public function getOnly(array $data): array
    {
        $data = ['url' => "https://viacep.com.br/ws/{$data['cep']}/json", 'valor' => ''];
        $result = Utils::getRequestHttp($data);

        if($result->clientError()) throw new Exception('Cep não encontrado.');

        return $result->json();
    }
}
