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

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Endereço ​​De Entrega</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="sobrenome" placeholder="Sobrenome">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="endereco" placeholder="Endereço">
                        </div>  
                        <div class="form-group">
                            <input class="input" type="text" name="cidade" placeholder="Cidade">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="telefne" placeholder="Telepone">
                        </div>
                    </div>
                    <!-- /Billing Details -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">O Seu Pedido</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUTO</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            <div class="order-col">
                                @if (count($itensCarrinho) > 0)
                                    @foreach ($itensCarrinho as $item)
                                        <div class="row">
                                            <div>{{ $item->quantidade }} {{ $item->nome }}</div>
                                            <div> {{ number_format($item->preco, 2, ',', '.') }} {{ 'AOA' }}</div>
                                        </div>
                                    @endforeach
                                @else
                                @endif


                            </div>

                        </div>

                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div>
                                <p class="order-total">{{ 'AOA' }}
                                    {{ number_format($precoTotalCarrinho, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                               Depósito
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Transferência Bancária
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3">
                            <label for="payment-3">
                                <span></span>
                                Cash
                            </label>
                            <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="{{route('web.checkout.store')}}" method="post">
                            @csrf
                            <button type="btn" class="primary-btn order-submit">Concluir</button>
                        </form>
                    </div>
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
