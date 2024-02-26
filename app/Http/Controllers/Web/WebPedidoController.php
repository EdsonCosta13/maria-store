<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\core\ItemPedido;
use App\Models\core\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebPedidoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('ClienteMiddleware');
    }

    public function index()
    {

        $page_title = "Minhas Compras";
        $page_description = "Informações Detalhadas dos Pedidos";
        $usuario = Auth::user();
        $pedidos = Pedido::where('usuario_id', $usuario->id)->get();

        // $pedidos=Pedido::where('usuario_id',$userId)->first();

        return view('web.pages.general.pedidos', [
            'page_title' => $page_title,
            'page_description' => $page_description,
            'pedidos' => $pedidos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function viewOrderItems($pedido_id)
    {

        $pedido = Pedido::where('pedido_id', $pedido_id)->first();

        if (!$pedido) {
            return redirect()->back()->with('error', 'Pedido not found!');
        }

        $itensPedido = ItemPedido::where('pedido_id', $pedido_id)
            ->join('produtos', 'item_pedidos.produto_id', '=', 'produtos.produto_id')
            ->select('item_pedidos.*', 'produtos.nome', 'produtos.descricao', 'produtos.preco')
            ->get();

        $pedidoInfo = Pedido::find($pedido_id);

        $totalPedido = $itensPedido->sum(function ($item) {
            return $item->quantidade * $item->preco;
        });

        // dd($itensPedido);

        $page_title = "Items do pedido ".$pedido_id;
        $page_description = "Informações Detalhadas do meu pedido";

        return view('web.pages.general.itemPedido', [
            'page_title'=>$page_title,
            'page_description'=>$page_description,
            'itensPedido' => $itensPedido,
            'pedidoInfo' => $pedidoInfo, // Se necessário, para exibir informações adicionais sobre o pedido
            'totalPedido'=>$totalPedido,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
