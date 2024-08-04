<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{

    /**
     * @var string
     */
    protected $table = 'pessoas';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'nome', 'nome_social', 'cpf', 'nome_pai', 'nome_mae', 'telefone', 'email', 'deleted_at'
    ];
}
