<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PessoaEndereco extends Model
{
    /**
     * @var string
     */
    protected $table = 'pessoa_endereco';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id_pessoa', 'id_endereco', 'deleted_at'
    ];

}
