<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    /**
     * Lista de campos 
     * que são permitidos 
     * para atribuição em massa 
     * ao criar 
     * ou atualizar 
     * um registro de estoque
     */
    protected $fillable = [
        'nome',
    ];
}
