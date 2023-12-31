<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
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

    /**
     * Relaciona estoques e produtos
     * através da tabela estoques_produtos
     * muitos para muitos 
     */
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'estoques_produtos');
    }
}
