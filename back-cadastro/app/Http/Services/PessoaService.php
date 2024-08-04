<?php

namespace App\Http\Services;

use App\Models\Pessoa;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class PessoaService
{
/**
     * Function to save producer
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function store(array $data): array
    {
        try{
            DB::beginTransaction();

            $pessoa = Pessoa::create($data);

            $pessoa->save();

            $resultPessoa = $pessoa->toArray();

            DB::commit();

            return $resultPessoa;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Function to update producer
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function update(array $data): array
    {
        $pessoa = Pessoa::whereNull('deleted_at')
        ->where('id', $data['id'])
        ->get()->toArray();

        if(count($pessoa) === 0) throw new Exception('Pessoa não encontrada.');
        
        $pessoaUpdated = Pessoa::updateOrCreate(['id' => $data['id']], $data)->toArray();

        return $pessoaUpdated;
    }

    /**
     * Function to obtain result by uuid
     * @param array $data
     * @return array
     */
    public function find(array $data): array
    {

        $query = Pessoa::whereNull('deleted_at');

            $query->Where('id', $data['pesquisa']);

            $query->orWhere('nome', 'like', '%'.$data['pesquisa'].'%');

            $query->orWhere('cpf', 'like', '%'.$data['pesquisa'].'%');
        

        $query = $query->get()->toArray();

        return $query;
    }

    /**
     * Function to obtain result by uuid
     * @param array $data
     * @return array
     */
    public function getOnly(array $data): array
    {

        $query = Pessoa::whereNull('deleted_at')->Where('id', $data['id']);

        $query = $query->get()->toArray();

        return $query;
    }

    /**
     * Function to obtain lista de pessoas
     * @param array $data
     * @return array
     */
    public function list(array $data): array
    {

        $query = Pessoa::whereNull('deleted_at')->get()->toArray();

        return $query;
    }
}