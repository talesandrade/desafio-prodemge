<?php

namespace App\Http\Controllers;

use App\Http\Requests\Endereco\CreateEnderecoRequest;
use App\Http\Requests\Endereco\GetEnderecoAtualRequest;
use App\Http\Requests\Endereco\ListEnderecoRequest;
use App\Http\Requests\Endereco\UpdateEnderecoRequest;
use App\Http\Services\EnderecoService;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * @param CreateEnderecoRequest $request
     * @param EnderecoService $service
     * @return mixed
     * @throws \Exception
     */
    public function create(CreateEnderecoRequest $request, EnderecoService $service)
    {
        return response()->json(['data' => $service->store($request->validated()), 'status' => 200, 'msg' => 'success']);
    }

    /**
     * @param UpdateEnderecoRequest $request
     * @param EnderecoService $service
     * @return mixed
     * @throws \Exception
     */
    public function update(UpdateEnderecoRequest $request, EnderecoService $service)
    {
        return response()->json(['data' => $service->update($request->validated()), 'status' => 200, 'msg' => 'success']);
    }

    /**
     * @param GetEnderecoAtualRequest $request
     * @param EnderecoService $service
     * @return mixed
     */
    public function getEnderecoAtual(GetEnderecoAtualRequest $request, EnderecoService $service)
    {
        return response()->json(['data' => $service->getEnderecoAtual($request->validated()), 'status' => 200, 'msg' => 'success']);
    }

    /**
     * @param ListEnderecoRequest $request
     * @param EnderecoService $service
     * @return mixed
     */
    public function list(ListEnderecoRequest $request, EnderecoService $service)
    {
        return response()->json(['data' => $service->list($request->validated()), 'status' => 200, 'msg' => 'success']);
    }
}
