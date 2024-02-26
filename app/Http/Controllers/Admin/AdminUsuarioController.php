<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\rh\Pessoa;
use App\Models\User;
use App\Models\seg\UserRole;
use App\Models\seg\Role;

use \Auth;



class AdminUsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('CheckRole');
    }

    public function index()
    {
        $page_title="Gestão de Utilizadores";
        $users=User::all();

        return view('admin.pages.usuario.index',[
            'page_title'=>$page_title,
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title="Registrar Utilizador";
        $roles=Role::all();

        return view('admin.pages.usuario.create',[
            'page_title'=>$page_title,
            'roles'=>$roles,
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

        //dd($request->all());

        $request->validate([
            'primeiro_nome'=>['required','min:3'],
            'sobrenome'=>['required','min:3'],
            'telefone'=>['required','min:9','max:9'],
            'password'=>['required','min:6'],
        ],[
            'primeiro_nome.required'=>'O nome é obrigatório',
            'primeiro_nome.min'=>'O nome deve ter pelo menos 3 letras',
            'sobrenome.required'=>'O sobrenome é obrigatório',
            'sobrenome.min'=>'O sobrenome deve ter pelo menos 3 letras',
            'telefone.required'=>'O telefone é obrigatório',
            'telefone.min'=>'O telefone deve ter pelo menos 9 numeros',
            'telefone.max'=>'O telefone deve ter no máximo  9 numeros',
        ]);

        $existsEmail=User::where('email',$request->email)->first();
        $existsTelefone=Pessoa::where('telefone',$request->telefone)->first();

        if($existsEmail)
        {
            //toast('Email existente!','error');
            return redirect()->back();
        }

        if($existsTelefone)
        {
            //toast('Telefone existente!','error');
            return redirect()->back();
        }

        $personData=[
            "primeiro_nome"=>$request->primeiro_nome,
            "sobrenome"=>$request->sobrenome,
            "telefone"=>$request->telefone,
        ];

        $person=Pessoa::create($personData);
        $personId=$person->pessoa_id;


        $user=User::create([
            'email' => $request->email,
            'pessoa_id'=>$personId,
            'password' => Hash::make($request->password),
        ]);

        $userRole=UserRole::create([
            'user_id'=>$user->id,
            'role_id'=>$request->role_id,
        ]);

        return redirect()->back()->with('success','Utilizador registrado com sucesso!');
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
        $user=User::find($id);

        if(!$user)
        {
            return redirect()->back();
        }

        if(Auth::user()->id==$user->id)
        {
            return redirect()->back();
        }

        $user->delete();
        return redirect()->back();

    }
}
