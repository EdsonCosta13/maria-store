<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\core\Categoria;
use App\Models\core\Imagem;
use App\Models\core\Produto;
use Illuminate\Http\Request;

use \DB;

use Barryvdh\DomPDF\Facade\Pdf;

class AdminProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('CheckRole');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Gestão de Produtos";
        // $products = Produto::all();

        // $images = Imagem::all();

        $products = DB::table('produtos')
            ->leftJoin('imagems', 'produtos.produto_id', '=', 'imagems.produto_id')
            ->leftJoin('categorias','produtos.categoria_id','=','categorias.categoria_id')
            ->select('produtos.*', 'imagems.nome as imagem_nome','categorias.designacao as categoria')
            ->get();

        return view('admin.pages.produto.index', [
            'page_title' => $page_title,
            'products' => $products,
            // 'images' => $images,
        ]);
    }

    public function uploadImagem(Request $request)
    {
        dd("chegou");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Registrar Produto";
        $categories = Categoria::all();

        return view('admin.pages.produto.create', [
            'page_title' => $page_title,
            'categories' => $categories,
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

        $request->validate(
            [
                'nome' => ['required', 'min:3'],
                'descricao' => ['required', 'min:3'],
                'preco' => ['required'],
                'quantidade' => ['required'],
                'categoria_id' => ['required'],
                'imagem_id' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg'],
            ],
            [
                'nome.required' => 'O nome do produto é obrigatório',
                'descricao.required' => 'A descricao do produto é obrigatória',
                'preco.required' => 'O preço do produto é obrigatório',
                'quantidade.required' => 'A quantidade do produto é obrigatória',
                'categoria_id.required' => 'A categoria do produto é obrigatória',
                'imagem_id.required' => 'A imagem é obrigatória',
                'imagem_id.image' => 'O ficheiro deve ser uma imagem',
                'imagem_id.max' => 'Tamanho da imagem excedido',
                'imagem_id.mimes' => 'Formato de imagem inválido',
            ]
        );

        try {

            $product = Produto::create([
                "nome" => $request->nome,
                "descricao" => $request->descricao,
                "preco" => $request->preco,
                "quantidade" => $request->quantidade,

                "categoria_id" => $request->categoria_id,

            ]);

            if ($request->hasFile('imagem_id') && $request->file('imagem_id')->isValid()) {
                $requestImage = $request->imagem_id;

                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

                $requestImage->move(public_path("images/products"), $imageName);

                $image = Imagem::create([
                    "nome" => $imageName,
                    "tipo" => "capa_produto",
                    "path" => null,
                    "produto_id" => $product->produto_id,
                ]);

                return redirect()->route('admin.product.index')->with('success','Produto registrado com sucesso!');

            }

            // $image = Imagem::create([
            //     "tipo" => "capa_produto",
            //     "path"=>$this->uploadFile($request,'imagem_id', 'produtos/imagem'.$request->imagem_id),
            //     "produto_id" => $product->produto_id,
            // ]);

            // return redirect()->back();

            return redirect()->route('admin.product.index');

        } catch (\Exception $ex) {

        }
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

        $product=Produto::find('produto_id',$id);


        if(!$product)
        {
            return redirect()->route('admin.product.index')->with('error','Produto não encontrado!');
        }

        $page_title="Editar Produto :".$product->produto_id;
        $categories = Categoria::all();


        return view('admin.pages.produto.edit',[
            'page_title'=> $page_title,
            'product'=>$product,
            'categories'=>$categories,
        ]);
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
        $product = Produto::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('admin.product.index');
        }
    }
}
