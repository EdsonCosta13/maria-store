<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\core\Categoria;

class AdminCategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('CheckRole');


    }

    public function index()
    {
        $page_title="Gestão de Categorias";
        $categories = Categoria::whereNull('deleted_at')->get();

        return view('admin.pages.categoria.index',[
            'page_title'=>$page_title,
            'categories'=>$categories,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'designacao' => ['required', 'min:3', 'string'],
        ],
            [
                'designacao.required' => 'O  Designação é  obrigatória!'
            ]
        );

        try{

            $categoryExists=Categoria::where('designacao',$request->designacao)->first();

            if($categoryExists)
            {
                return redirect()->back()->with('error','Categoria existente!');
            }

            $categoryToStore=Categoria::create([
                'designacao'=>$request->designacao,
            ]);

            return redirect()->back()->with('success','Categoria criada!');

        }catch(\Exception $ex)
        {
            Log::debug('1. CategoriaController->store() : ' . $ex->getMessage());

            return redirect()
                ->route('')
                ->with('error', 'Alguma coisa correu mal ao tentar  registar a Categoria!');
        }

    }

    public function edit($id)
    {

        $category=Categoria::find($id);

        if(!$category)
        {
            return redirect()->route('admin.category.index');
        }

        $page_title="Editar Categoria:" .$category->categoria_id;


        return view('admin.pages.categoria.edit',[
            'page_title'=>$page_title,
            'category'=>$category,
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'designacao'=>['required','min:3'],
        ],[
            'designacao.required'=>'A categoria é obrigatória!',
            'designacao.min'=>'A categoria deve ter no minimo 3  caracteres!',
        ]);

        $category=Categoria::where('categoria_id',$id)->first();
        $category->designacao=$request->designacao;
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $categorie=Categoria::find($id);

        if($categorie)
        {
            $categorie->delete();
            return redirect()->back();
        }

        return redirect()->back();
    }

}
