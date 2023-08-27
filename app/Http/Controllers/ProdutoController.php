<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Retorna uma lista de todos os registros de produto.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtém todos os registros da tabela "produtos" usando o modelo Produto */
        $produtos = Produto::all();

        // Retorna os dados dos produtos como uma resposta JSON
        return response()->json($produtos);
    }

    /**
     * Armazena um novo registro de produto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos do corpo da requisição.
        // Certifica-se de que 'nome' é uma string e é obrigatório.
        $data = $request->validate([
            'nome' => 'required|string',
        ]);

        // Cria um novo registro de produto usando os dados validados.
        $produto = Produto::create($data);

        // Retorna o registro de produto criado como resposta JSON
        // com um código de status 201 (Created).
        return response()->json($produto, 201);
    }

    /**
     * Atualiza um registro de produto existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        // Valida os dados recebidos do corpo da requisição.
        // Certifica-se de que 'nome' é uma string.
        $data = $request->validate([
            'nome' => 'required|string',
        ]);

        // Atualiza os dados do registro de produto com os dados validados.
        $produto->update($data);

        // Retorna o registro de produto atualizado como resposta JSON.
        return response()->json($produto);
    }

    /**
     * Exclui um registro de produto.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        // Exclui o registro de produto.
        $produto->delete();

        // Retorna uma resposta vazia com código de status 204 (No Content)
        // para indicar que a operação foi bem-sucedida e o recurso foi excluído.
        return response()->json(null, 204);
    }
}
