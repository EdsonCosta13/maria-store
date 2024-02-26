<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Models\rh\Pessoa;
use App\Models\rh\Cliente;
use App\Models\Seg\UserRole;

class WebUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title="Meu Perfil";
        $page_description="Informações do Utilizador";



        return view('web.pages.user.index',[
            'page_title'=>$page_title,
            'page_description'=>$page_description,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title="Registro de Clientes";
        $page_description='';

        return view('web.pages.user.create',[
            'page_title'=>$page_title,
            'page_description'=>$page_description,
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
                'primeiro_nome' => ['required','min:3'],
                'sobrenome'=>['required','min:3'], 
                'telefone'=>['required'],
                'email'=>['required'],
                'password'=>['required'],
            ],
            [
                'primeiro_nome.required'=>'O primeiro nome é obrigatório!',
                'primeiro_nome.min'=>'O primeiro nome deve ter no minimo 3 caracteres!',
                'sobrenome.required'=>'O sobrenome é obrigatório!',
                'sobrenome.min'=>'O sobrenome deve ter no minimo 3 caracteres!',
                'telefone.required'=>'O telefone é obrigatório!',
                'email.required'=>'O email é obrigatório!',
                'password.required'=>'A palavra-passe é obrigatória!',
            ]);

            try{

                $existsTelephone=Pessoa::where('telefone',$request->telefone)->first();

                $existsEmail=User::where('email',$request->email)->first();

                if($existsTelephone)
                {
                    return redirect()->back()->with('error',"Telefone já registado!");
                }

                if($existsEmail)
                {
                    return redirect()->back()->with('error',"Email já registado!");
                }

                $personData=[
                    "primeiro_nome"=>$request->primeiro_nome,
                    "sobrenome"=>$request->sobrenome,
                    "telefone"=>$request->telefone,
                ];

                $person=Pessoa::create($personData);

                $client=Cliente::create([
                    "pessoa_id"=>$person->pessoa_id
                ]);

                $userData=[
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'pessoa_id'=>$person->pessoa_id,
                ];

                $user=User::create($userData);


                $userRole = UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => 2,
                ]);

                return redirect()->back()->with('success','Cliente registrado com sucesso!');

            }catch(\Exception $ex)
            {
                Log::debug('1. WebUsuarioController->store() : ' . $ex->getMessage());

                return redirect()
                        ->back();

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
