@extends('web.layouts.app')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">{{ $page_title }}</h3>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="{{ asset('images/products/' . $product->imagem_nome) }}" alt="Imagem do Produto">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('images/products/' . $product->imagem_nome) }}" alt="Imagem do Produto">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('images/products/' . $product->imagem_nome) }}" alt="Imagem do Produto">
                        </div>
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="{{ asset('images/products/' . $product->imagem_nome) }}" alt="Imagem do Produto">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('images/products/' . $product->imagem_nome) }}" alt="Imagem do Produto">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('images/products/' . $product->imagem_nome) }}" alt="Imagem do Produto">
                        </div>

                        <div class="product-preview">
                            <img src="{{ asset('images/products/' . $product->imagem_nome) }}" alt="Imagem do Produto">
                        </div>
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $product->nome }}</h2>

                        <div>
                            <h3 class="product-price">{{ number_format($product->preco, 2, ',', '.') }} {{ 'AOA' }}
                            </h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>


                        <div class="add-to-cart">
                            <div class="qty-label">
                                Quantidade
                                <div class="input-number">
                                    <input type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>

                            <!-- Adicionar Produto ao Carrinho -->
                            <form action="{{ route('web.carrinho.addProduct') }}" method="POST">
                                @csrf
                                <input type="hidden" name="produto_id" value="{{ $product->produto_id }}">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Adicionar </button>
                            </form>

                        </div>

                        <ul class="product-links">
                            <li>Categoria:</li>
                            <li><a href="#">{{ $product->categoria }}</a></li>
                        </ul>


                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Descrição</a></li>
                            <li><a data-toggle="tab" href="#tab2">Detalhes</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $product->descricao }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $product->descricao }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
