<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\core\Produto;
use App\Models\core\Categoria;
use App\Models\core\Imagem;

use \DB;

class WebDashboardController extends Controller
{
    public function index()
    {
        //$products=produto::all();
        $products = DB::table('produtos')
        ->leftJoin('imagems', 'produtos.produto_id', '=', 'imagems.produto_id')
        ->leftJoin('categorias','produtos.categoria_id','=','categorias.categoria_id')
        ->select('produtos.*', 'imagems.nome as imagem_nome','categorias.designacao as categoria')
        ->get();

        return view('web.pages.general.index',[
            'products'=>$products,
        ]);
    }
}
