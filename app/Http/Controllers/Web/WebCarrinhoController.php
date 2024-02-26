<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Models\core\Carrinho;
use App\Models\core\CarrinhoItem;
use App\Models\core\Produto;
use App\Models\User;

class WebCarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::user()) {
            return view('web.pages.general.cartEmpty');
        }

        $usuario_id = auth()->user()->id;

        $itensCarrinho = DB::table('carrinho_items')
            ->join('carrinhos', 'carrinho_items.carrinho_id', '=', 'carrinhos.carrinho_id')
            ->join('produtos', 'carrinho_items.produto_id', '=', 'produtos.produto_id')
            ->where('carrinhos.usuario_id', $usuario_id)
            ->where('carrinhos.status', 'Activo')
            ->select('carrinho_items.*', 'produtos.nome', 'produtos.descricao', 'produtos.preco')
            ->whereNull('carrinhos.deleted_at')
            ->get();

        // Inicialize o preço total do carrinho como zero
        $precoTotalCarrinho = 0;

        // Itere sobre os itens do carrinho para calcular o total
        foreach ($itensCarrinho as $item) {
            $precoTotalCarrinho += $item->quantidade * $item->preco;
        }

        return view('web.pages.general.cart', [
            'itensCarrinho' => $itensCarrinho,
            'precoTotalCarrinho' => $precoTotalCarrinho,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        if (Auth::check()) {

            $usuario_id = auth()->user()->id;
            $produto_id = $request->produto_id;


            // Verificar se o item já existe no carrinho do usuário
            $carrinho = Carrinho::where('usuario_id', $usuario_id)->first();
            $produto = Produto::find($produto_id);

            if (!$carrinho) {
                // Se o carrinho não existir, crie um novo
                $carrinho = Carrinho::create(['usuario_id' => $usuario_id]);
            }

            $qtdDisponivel = Produto::where('produto_id', $produto_id)->value('quantidade');
            $novaQtd = 1;

            if ($qtdDisponivel < 1) {
                return redirect()->back()->with('warning', 'Produto indisponivel!');
            }

            // Verificar se o produto já está no carrinho
            $itemExistente = CarrinhoItem::where('carrinho_id', $carrinho->carrinho_id)
                ->where('produto_id', $produto_id)
                ->first();

            if ($itemExistente) {

                if ($qtdDisponivel < 1) {
                    return redirect()->route('web.loja')->with('error', 'Quantidade máxima atingida para este produto.');
                }

                $itemExistente->quantidade += $novaQtd;
                $qtdDisponivel = $qtdDisponivel - $novaQtd;
                $produto->update(['quantidade' => $qtdDisponivel]);
                $itemExistente->save();

                return redirect()->route('web.loja')->with('success', 'Quantidade actualizada com sucesso!');
            } elseif ($qtdDisponivel > 0) {
                // Caso contrário, crie um novo item no carrinho
                CarrinhoItem::create([
                    'carrinho_id' => $carrinho->carrinho_id,
                    'produto_id' => $produto_id,
                    'quantidade' => 1,
                ]);

                $qtdDisponivel = $qtdDisponivel - $novaQtd;
                $produto->update(['quantidade' => $qtdDisponivel]);

                // Recalcula o preço total do carrinho

                //$carrinho->load('itens');

                $carrinho->total = $carrinho->itens->sum(function ($item) {
                    return $item->quantidade * $item->produto->preco; // Substitua 'preco' pelo nome do campo de preço em sua tabela de produtos
                });

                $carrinho->save();



                return redirect()->route('web.loja')->with('success', 'Produto adicionado com sucesso!');
            }

        } else {
            return redirect()->route('auth.loginGet')->with('error', 'Você precisa estar logado para adicionar produtos ao carrinho.');
        }
    }

    public function removerItem(Request $request)
    {
        // Obter o ID do item do carrinho a ser removido
        $item_id = $request->item_id;

        // Verificar se o item pertence ao usuário autenticado
        $item = CarrinhoItem::where('carrinho_item_id', $item_id)->first();

        $usuario_id = auth()->user()->id;

        if (!$item) {
            return redirect()->back()->with('error', 'Produto não encontrado no seu carrinho.');
        }

        if ($item->carrinho->usuario_id != $usuario_id) {
            return redirect()->back()->with('error', 'Não autorizado!');
        }

        // Remover o item do carrinho
        $item->delete();

        return redirect()->route('web.cart.index')->with('success', 'Produto removido do carrinho com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
