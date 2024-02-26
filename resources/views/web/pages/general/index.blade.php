@extends('web.layouts.app')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('web/img/shop01.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Novos Pratos<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                                <!-- shop -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="shop">
                                        <div class="shop-img">
                                            <img src="{{asset('web/img/shop02.png')}}" alt="">
                                        </div>
                                        <div class="shop-body">
                                            <h3>Pizzas<br>Collection</h3>
                                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('web/img/shop03.png')}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Humburgers<br>Collection</h3>
                            <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Novos Pratos Produtos</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Novos Pratoss</a></li>
                                <li><a data-toggle="tab" href="#tab1">Pratos</a></li>
                                <li><a data-toggle="tab" href="#tab1">Pizzas</a></li>
                                <li><a data-toggle="tab" href="#tab1">Humburgers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @forelse ($products as $product)

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            {{-- <img src="{{asset('web/img/product05.png')}}" alt=""> --}}
                                            <img src="{{ asset('images/products/'.$product->imagem_nome)}}">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->categoria}}</p>
                                            <h3 class="product-name"><a href="#">{{$product->nome}}</a></h3>
                                            <h4 class="product-price">{{ number_format($product->preco, 2, ',', '.') }} {{'AOA'}}</h4>

                                            <div class="product-btns">
                                                <a class="quick-view" href="{{route('web.product',[$product->produto_id])}}"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">Visualizar</span></a>
                                            </div>
                                        </div>
                                        <form action="{{route('web.carrinho.addProduct',[$product->produto_id])}}" method="post">
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="produto_id" value="{{ $product->produto_id }}">
                                            <div class="add-to-cart">
                                                <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Adicionar</button>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /product -->

                                    @empty

                                    @endforelse
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Dias</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Horas</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Min</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Seg</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase" style="color: #fff;">Gulla App - deal esta semana</h2>
                        <p style="color: #fff;">Nova pratos com 50% de descontos</p>
                        <a class="primary-btn cta-btn" href="{{route('web.loja')}}" style="color: #fff;">Produtos</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Produtos Mais Vendidos</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab2">Novos Pratoss</a></li>
                                <li><a data-toggle="tab" href="#tab2">Pratos</a></li>
                                <li><a data-toggle="tab" href="#tab2">Pizzas</a></li>
                                <li><a data-toggle="tab" href="#tab2">Humburgers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">

                                    @forelse ($products as $product)

                                     <!-- product -->
                                     <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('images/products/'.$product->imagem_nome)}}">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->categoria}}</p>
                                            <h3 class="product-name"><a href="#">{{$product->nome}}</a></h3>
                                            <h4 class="product-price">{{ number_format($product->preco, 2, ',', '.') }} {{'AOA'}}</h4>
                                            <div class="product-btns">
                                                <a class="btn quick-view" href="{{route('web.product',[$product->produto_id])}}"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">Visualizar</span></a>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                cart</button>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    @empty

                                    @endforelse

                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
