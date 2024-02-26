<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

use App\Models\User;


class AccessController extends Controller
{

    public function login()
    {
        $page_title = "Iniciar Sessão";
        $description_page = "Faça o login para acessar a sua Conta";

        return view('auth.login', [
            'page_title' => $page_title,
            'description_page' => $description_page,
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ],
            [
                'email.required' => "Campo obrigatório!",
                'password.required' => "Campo obrigatório!",
            ]
        );

        $auth=Auth::attempt($credentials);

        if(!$auth)
        {
            // toast('Credenciais Incorrectas!', 'error');
            return redirect()->back();
        }

        return redirect()->route('auth.provideAccess');

    }

    public function provideAcess(Request $request)
    {
        if (!Auth::check()) {
            //toast('Você não possui permissão para acessar este recurso!', 'error');
            return redirect()->route('loginGet')->with('error', 'Você não possui permissão.');
        }
        $user = User::find(Auth::user()->id);

        if ($user->hasAnyRole(['Admin','Operador'])) {
            return redirect()->route('admin.painel');
        } else if ($user->hasAnyRole(['Cliente'])) {
            return redirect()->route('web.loja');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.loginGet');
    }

}
