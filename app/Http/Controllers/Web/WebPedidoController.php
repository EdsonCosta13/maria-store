<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\core\Pedido;
use App\Models\User;
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


        $page_title="Minhas Compras";
        $page_description="Informações Detalhadas dos Pedidos";
        $usuario = Auth::user();
        $pedidos=Pedido::where('usuario_id',$usuario->id)->get();

        // $pedidos=Pedido::where('usuario_id',$userId)->first();

        return view('web.pages.general.pedidos',[
            'page_title'=>$page_title,
            'page_description'=>$page_description,
            'pedidos'=>$pedidos,
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
        //
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
