<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\core\Produto;
use App\Models\core\Categoria;
use App\Models\core\Imagem;

use \DB;

class WebProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title="Loja";

        $products = DB::table('produtos')
            ->leftJoin('imagems', 'produtos.produto_id', '=', 'imagems.produto_id')
            ->leftJoin('categorias','produtos.categoria_id','=','categorias.categoria_id')
            ->select('produtos.*', 'imagems.nome as imagem_nome','categorias.designacao as categoria')
            ->get();  

        $categories=Categoria::all();

        return view('web.pages.general.products',[
            'page_title'=>$page_title,
            'products'=>$products,
            'categories'=>$categories,
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
        $page_title="Detalhes produto ";


        $product = DB::table('produtos')
            ->leftJoin('imagems', 'produtos.produto_id', '=', 'imagems.produto_id')
            ->leftJoin('categorias','produtos.categoria_id','=','categorias.categoria_id')
            ->select('produtos.*', 'imagems.nome as imagem_nome','categorias.designacao as categoria')
            ->where('produtos.produto_id', $id)
            ->first();

            if (!$product) {
                return redirect()->route('web.loja');
            }



        return view('web.pages.general.productDetails',[
            'product'=>$product,
            'page_title'=>$page_title,
        ]);
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
