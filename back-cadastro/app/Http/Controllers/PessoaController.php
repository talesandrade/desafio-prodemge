<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pessoa\CreatePessoaRequest;
use App\Http\Requests\Pessoa\FindPessoaRequest;
use App\Http\Requests\Pessoa\GetOnlyPessoaRequest;
use App\Http\Requests\Pessoa\ListPessoaRequest;
use App\Http\Requests\Pessoa\UpdatePessoaRequest;
use App\Http\Services\PessoaService;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * @param CreatePessoaRequest $request
     * @param PessoaService $service
     * @return mixed
     * @throws \Exception
     */
    public function create(CreatePessoaRequest $request, PessoaService $service)
    {
        return response()->json(['data' => $service->store($request->validated()), 'status' => 200, 'msg' => 'success']);
    }

    /**
     * @param UpdatePessoaRequest $request
     * @param PessoaService $service
     * @return mixed
     * @throws \Exception
     */
    public function update(UpdatePessoaRequest $request, PessoaService $service)
    {
        return response()->json(['data' => $service->update($request->validated()), 'status' => 200, 'msg' => 'success']);
    }

    /**
     * @param GetOnlyPessoaRequest $request
     * @param PessoaService $service
     * @return mixed
     */
    public function getOnly(GetOnlyPessoaRequest $request, PessoaService $service)
    {
        return response()->json(['data' => $service->getOnly($request->validated()), 'status' => 200, 'msg' => 'success']);
    }

    /**
     * @param ListPessoaRequest $request
     * @param PessoaService $service
     * @return mixed
     */
    public function list(ListPessoaRequest $request, PessoaService $service)
    {
        return response()->json(['data' => $service->list($request->validated()), 'status' => 200, 'msg' => 'success']);
    }

    /**
     * @param FindPessoaRequest $request
     * @param PessoaService $service
     * @return mixed
     */
    public function find(FindPessoaRequest $request, PessoaService $service)
    {
        return response()->json(['data' => $service->find($request->validated()), 'status' => 200, 'msg' => 'success']);
    }
}
