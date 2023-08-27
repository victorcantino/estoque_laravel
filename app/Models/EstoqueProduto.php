<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueProduto extends Model
{
    use HasFactory;
    protected $table = 'estoques_produtos';

    /**
     * Lista de campos 
     * que são permitidos 
     * para atribuição em massa 
     * ao criar 
     * ou atualizar 
     * um registro de estoque
     */
    protected $fillable = [
        'estoque_id',
        'produto_id',
    ];
}
