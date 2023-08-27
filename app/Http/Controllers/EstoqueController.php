<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * Retorna uma lista de todos os registros de estoque.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtém todos os registros da tabela "estoques" usando o modelo Estoque */
        $estoques = Estoque::all();

        // Retorna os dados dos estoques como uma resposta JSON
        return response()->json($estoques);
    }

    /**
     * Armazena um novo registro de estoque.
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

        // Cria um novo registro de estoque usando os dados validados.
        $estoque = Estoque::create($data);

        // Retorna o registro de estoque criado como resposta JSON
        // com um código de status 201 (Created).
        return response()->json($estoque, 201);
    }

    /**
     * Atualiza um registro de estoque existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estoque $estoque)
    {
        // Valida os dados recebidos do corpo da requisição.
        // Certifica-se de que 'nome' é uma string.
        $data = $request->validate([
            'nome' => 'required|string',
        ]);

        // Atualiza os dados do registro de estoque com os dados validados.
        $estoque->update($data);

        // Retorna o registro de estoque atualizado como resposta JSON.
        return response()->json($estoque);
    }

    /**
     * Exclui um registro de estoque.
     *
     * @param  \App\Models\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estoque $estoque)
    {
        // Exclui o registro de estoque.
        $estoque->delete();

        // Retorna uma resposta vazia com código de status 204 (No Content)
        // para indicar que a operação foi bem-sucedida e o recurso foi excluído.
        return response()->json(null, 204);
    }

    /**
     * Retorna a lista de produtos associados ao estoque especificado.
     *
     * @param \App\Models\Estoque $estoque Instância do modelo Estoque
     * @return \Illuminate\Http\JsonResponse Retorna a lista de produtos como JSON
     */
    public function produtos(Estoque $estoque)
    {
        // Obtém a lista de produtos associados ao estoque
        $produtos = $estoque->produtos;

        // Retorna a lista de produtos como resposta JSON
        return response()->json($produtos);
    }

    /**
     * Relaciona produtos ao estoque especificado.
     *
     * @param \Illuminate\Http\Request $request Requisição HTTP com os IDs dos produtos
     * @param \App\Models\Estoque $estoque Instância do modelo Estoque
     * @return \Illuminate\Http\JsonResponse Retorna o estoque com os produtos relacionados
     */
    public function relaciona_produtos(Request $request, Estoque $estoque)
    {
        // Obtém a lista de IDs de produtos do corpo da requisição
        $produtosIds = $request->input('produtos_ids', []);

        // Remove quaisquer associações anteriores e associa os novos produtos
        $estoque->produtos()->sync($produtosIds);

        // Retorna o estoque com os produtos relacionados
        return response()->json($estoque->produtos);
    }
}
