<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\seg\UserRole;

use App\Models\rh\Pessoa;
use App\Models\rh\Cliente;



class AdminClienteController extends Controller
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
        $page_title="Gestão de Clientes";
        $clients=Cliente::all();

        return view('admin.pages.cliente.index',[
            'page_title'=>$page_title,
            'clients'=>$clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title="Registar  Cliente";


        return view('admin.pages.cliente.create',[
            'page_title'=>$page_title,

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

        $personData=[
            "primeiro_nome"=>$request->primeiro_nome,
            "sobrenome"=>$request->sobrenome,
            "telefone"=>$request->telefone,
        ];

        $person=Pessoa::create($personData);
        $personId=$person->pessoa_id;

        $client=new Cliente();
        $client->pessoa_id=$person->pessoa_id;
        $client->save();

        $user=User::create([
            'email' => $request->email,
            'pessoa_id'=>$personId,
            'password' => Hash::make(123456),
        ]);

        $userRole=UserRole::create([
            'user_id'=>$user->id,
            'role_id'=>3,
        ]);

        return redirect()->route('admin.client.index')->with('success','Cliente Registado');

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
