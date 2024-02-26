<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\core\ItemPedido;
use App\Models\core\Pedido;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebCheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('ClienteMiddleware');
    }

    public function index()
    {
        $page_title = "Checkout";
        $page_description = "Concluir compra";

        if (!Auth::user()) {
            return view('web.pages.general.cartEmpty');
        }

        $usuario_id = auth()->user()->id;

        $itensCarrinho = DB::table('carrinho_items')
            ->join('carrinhos', 'carrinho_items.carrinho_id', '=', 'carrinhos.carrinho_id')
            ->join('produtos', 'carrinho_items.produto_id', '=', 'produtos.produto_id')
            ->where('carrinhos.usuario_id', $usuario_id)
            ->select('carrinho_items.*', 'produtos.nome', 'produtos.descricao', 'produtos.preco')
            ->get();

        // Inicialize o preço total do carrinho como zero
        $precoTotalCarrinho = 0;

        // Itere sobre os itens do carrinho para calcular o total
        foreach ($itensCarrinho as $item) {
            $precoTotalCarrinho += $item->quantidade * $item->preco;
        }

        return view('web.pages.general.checkout', [
            'page_title' => $page_title,
            'page_description' => $page_description,
            'itensCarrinho' => $itensCarrinho,
            'precoTotalCarrinho' => $precoTotalCarrinho,
        ]);
    }

    public function create()
    {

    }

    private function gererateVendaRef($length)
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $reference = '';

        for ($i = 0; $i < $length; $i++) {
            $position = mt_rand(0, strlen($letters) - 1);
            $reference .= $letters[$position];
        }

        return $reference;
    }

    public function store(Request $request)
    {
        $usuario_id = auth()->user()->id;

        $itensCarrinho = DB::table('carrinho_items')
            ->join('carrinhos', 'carrinho_items.carrinho_id', '=', 'carrinhos.carrinho_id')
            ->join('produtos', 'carrinho_items.produto_id', '=', 'produtos.produto_id')
            ->where('carrinhos.usuario_id', $usuario_id)
            ->select('carrinho_items.*', 'produtos.produto_id', 'produtos.nome', 'produtos.descricao', 'produtos.preco')
            ->get();

        // Inicialize o preço total do carrinho como zero
        $precoTotalCarrinho = 0;

        // Itere sobre os itens do carrinho para calcular o total
        foreach ($itensCarrinho as $item) {
            $precoTotalCarrinho += $item->quantidade * $item->preco;
        }

        $invoiceData = [
            "referencia" => $this->gererateVendaRef(12),
            "data" => Carbon::now(),
            "hora" => Carbon::now()->format('H:i:s'),
            "estado" => 'Pendente',
            "total" => $precoTotalCarrinho,
            "metodo_pagamento" => "transferencia",
            "usuario_id" => $usuario_id,
        ];

        $invoice = Pedido::create($invoiceData);

        foreach ($itensCarrinho as $item) {
            $itemPedido = new ItemPedido();

            $itemPedido->quantidade = $item->quantidade;
            $itemPedido->produto_id = $item->produto_id;
            $itemPedido->pedido_id = $invoice->pedido_id;
            $itemPedido->save();
        }

        return redirect()->route('web.loja')->with('success', 'Pedido realizado!');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
