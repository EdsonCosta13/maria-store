<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\core\Produto;
use App\Models\core\Pedido;
use App\Models\User;
use App\Models\rh\Cliente;

class AdminDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('CheckRole');
    }

    public function index()
    {
        $page_title="Painel Administrativo";
        $page_description="Esta é uma Área De Gestão e Controle";
        $products=Produto::count();
        $clients=Cliente::count();
        $sales=Pedido::count();
        $users=User::count();

        return view('admin.pages.index',[
           'page_title'=>$page_title,
           'page_description'=>$page_description,
           'products'=>$products,
           'clients'=>$clients,
           'sales'=>$sales,
           'users'=>$users

        ]);
    }
}
