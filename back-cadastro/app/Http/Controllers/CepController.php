<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cep\GetOnlyCepRequest;
use App\Http\Services\CepService;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;

class CepController extends Controller
{
    /**
     * @param GetOnlyCepRequest $request
     * @param CepService $service
     * @return mixed
     */
    public function getOnly(GetOnlyCepRequest $request, CepService $service)
    {
        return response()->json(['status' => 200, 'msg' => 'sucess', 'data' => $service->getOnly($request->validated())]);
    }
}

