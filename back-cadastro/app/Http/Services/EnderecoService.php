<?php

namespace App\Http\Services;

use App\Models\Pessoa;
use App\Models\Endereco;
use App\Models\PessoaEndereco;
use Exception;
use Illuminate\Support\Facades\DB;

class EnderecoService
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

            $pessoa = Pessoa::whereNull('deleted_at')->Where('id', $data['pessoa_id'])->get()->toArray();
            unset($data['pessoa_id']);
            
            $endereco = Endereco::create($data);
            $resultEndereco = $endereco->toArray();

            $data_pessoa_endereco['id_pessoa'] = $pessoa[0]['id'];
            $data_pessoa_endereco['id_endereco'] = $resultEndereco['id'];

            $pessoa_endereco = PessoaEndereco::create($data_pessoa_endereco);

            DB::commit();

            return $resultEndereco;
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
        $endereco = Endereco::whereNull('deleted_at')
        ->where('id', $data['id'])
        ->get()->toArray();

        if(count($endereco) === 0) throw new Exception('Endereço não encontrado.');
        
        $enderecoUpdated = Endereco::updateOrCreate(['id' => $data['id']], $data)->toArray();

        return $enderecoUpdated;
    }

    /**
     * Function to obtain result by uuid
     * @param array $data
     * @return array
     */
    public function find(array $data): array
    {

        $query = Pessoa::whereNull('deleted_at');

        if($data['id'] != '')
            $query->Where('id', $data['id']);

        if($data['nome'] != '')
            $query->Where('nome', 'like', '%'.$data['nome'].'%');

        if($data['cpf'] != ''){
            $query->Where('cpf', 'like', '%'.$data['cpf'].'%');
        }

        $query = $query->get()->toArray();

        return $query;
    }

    /**
     * Function to obtain result by uuid
     * @param array $data
     * @return array
     */
    public function getEnderecoAtual(array $data): array
    {

        $query = Endereco::whereNull('enderecos.deleted_at')
        ->join('pessoa_endereco', 'enderecos.id', '=', 'pessoa_endereco.id_endereco')
        ->Where('pessoa_endereco.id_pessoa', $data['pessoa_id'])
        ->get()
        ->toArray();


        return $query;
    }

    /**
     * Function to obtain lista de pessoas
     * @param array $data
     * @return array
     */
    public function list(array $data): array
    {

        $query = Endereco::where('pessoa_endereco.id_pessoa', $data['pessoa_id'])
        ->join('pessoa_endereco', 'enderecos.id', '=', 'pessoa_endereco.id_endereco')
        ->get()
        ->toArray();


        return $query;
    }
}