<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AccessController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoriaController;
use App\Http\Controllers\Admin\AdminProdutoController;
use App\Http\Controllers\Admin\AdminClienteController;
use App\Http\Controllers\Admin\AdminUsuarioController;

use App\Http\Controllers\Admin\AdminVendaController;

use App\Http\Controllers\Web\WebProdutoController;

use App\Http\Controllers\Web\WebPedidoController;
use App\Http\Controllers\Web\WebDashboardController;
use App\Http\Controllers\Web\WebCarrinhoController;
use App\Http\Controllers\Web\WebUsuarioController;
use App\Http\Controllers\Web\WebCheckoutController;
use App\Http\Controllers\Web\WebAboutController;
use App\Http\Controllers\Web\WebContactController;


/*


Route::get('a/2/3',[AdminCategoriaController::class,'index']);
Route::get('category/index',[AdminCategoriaController::class,'index']);
Route::get('admin-category/index',[AdminCategoriaController::class,'index']);

Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/login',[AccessController::class,'login'])->name('auth.loginGet');
Route::get('/sign',[AccessController::class,'login'])->name('login');
Route::post('/sign',[AccessController::class,'authenticate'])->name('auth.authenticate');
Route::get('/provideAccess',[AccessController::class,'provideAcess'])->name('auth.provideAccess');
Route::get('/logout',[AccessController::class,'logout'])->name('auth.logout');


Route::get('/admin-painel-index',[AdminDashboardController::class,'index'])->name('admin.painel');


Route::get('/admin-category-index',[AdminCategoriaController::class,'index'])->name('admin.category.index');
Route::post('admin-category-store',[AdminCategoriaController::class,'store'])->name('admin.category.store');
Route::get('admin-category-edit-{id}',[AdminCategoriaController::class,'edit'])->name('admin.category.edit');
Route::post('admin-category-update-{id}',[AdminCategoriaController::class,'update'])->name('admin.category.update');
Route::post('admin-category-destroy-{id}',[AdminCategoriaController::class,'destroy'])->name('admin.category.destroy');

Route::get('admin-product-index',[AdminProdutoController::class,'index'])->name('admin.product.index');
Route::get('/uploadImagem',[AdminProdutoController::class,'uploadImagem'])->name('admin.product.uploadImagem');
Route::get('admin-product-create',[AdminProdutoController::class,'create'])->name('admin.product.create');
Route::post('admin-product-store',[AdminProdutoController::class,'store'])->name('admin.product.store');
Route::get('admin-product-edit-{id}',[AdminProdutoController::class,'edit'])->name('admin.product.edit');
Route::post('admin-product-update-{id}',[AdminProdutoController::class,'update'])->name('admin.product.update');
Route::post('admin-product-destroy-{id}',[AdminProdutoController::class,'destroy'])->name('admin.product.destroy');


Route::get('admin-venda-index',[AdminVendaController::class,'index'])->name('admin.venda.index');


Route::get('admin-utilizador-index',[AdminUsuarioController::class,'index'])->name('admin.utilizador.index');
Route::get('admin-utilizador-create',[AdminUsuarioController::class,'create'])->name('admin.utilizador.create');
Route::post('admin-utilizador-store',[AdminUsuarioController::class,'store'])->name('admin.utilizador.store');





Route::get('/admin-client-index',[AdminClienteController::class,'index'])->name('admin.client.index');
Route::get('/admin-client-create',[AdminClienteController::class,'create'])->name('admin.client.create');
Route::post('/admin-client-store',[AdminClienteController::class,'store'])->name('admin.client.store');
Route::get('/admin-client-edit-{id}',[AdminClienteController::class,'edit'])->name('admin.client.edit');
Route::post('/admin-client-update-{id}',[AdminClienteController::class,'update'])->name('admin.client.update');
Route::post('/admin-client-destroy-{id}',[AdminClienteController::class,'destroy'])->name('admin.client.destroy');


Route::get('/',function(){
    return redirect()->route('web.index');
});
Route::get('/home',[WebDashboardController::class,'index'])->name('web.index');
Route::get('/loja',[WebProdutoController::class,'index'])->name('web.loja');
Route::get('/product-{id}-details',[WebProdutoController::class,'show'])->name('web.product');
Route::get('/cart',[WebCarrinhoController::class,'index'])->name('web.cart.index');
Route::get('/about',[WebAboutController::class,'index'])->name('web.about');
Route::get('/contact-us',[WebContactController::class,'index'])->name('web.contact');
// Route::post('/addProductToCart-{id}', [WebCarrinhoController::class, 'addProduct'])->name('web.carrinho.addProduct');


Route::post('/carrinho/adicionar',[WebCarrinhoController::class,'addProduct'])->name('web.carrinho.addProduct');
Route::post('/carrinho/remover',[WebCarrinhoController::class,'removerItem'])->name('web.carrinho.removerItem');

Route::get('/cliente/checkout',[WebCheckoutController::class,'index'])->name('web.checkout.index');
Route::post('/cliente/checkout/store',[WebCheckoutController::class,'store'])->name('web.checkout.store');

Route::get('/cliente/meus-pedidos',[WebPedidoController::class,'index'])->name('web.pedido.index');
Route::get('/cliente/item-pedido/{id}',[WebPedidoController::class,'viewOrderItems'])->name('web.pedido.viewOrderItems');

Route::get('/cliente/perfil',[WebUsuarioController::class,'index'])->name('web.cliente.index');
Route::get('/cliente/register',[WebUsuarioController::class,'create'])->name('web.cliente.create');
Route::post('/cliente/store',[WebUsuarioController::class,'store'])->name('web.cliente.store');

//Route::get('carrinho', [WebCarrinhoController::class, 'index'])->name('web.carrinho.index');
//Route::post('/carrinho-add', [WebCarrinhoController::class, 'addProduct'])->name('web.carrinho.add');










//Auth::routes();

