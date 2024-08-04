<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{

    /**
     * @var string
     */
    protected $table = 'enderecos';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'tipo_endereco', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'deleted_at'
    ];
}
