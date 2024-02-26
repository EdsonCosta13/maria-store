@extends('web.layouts.app')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">{{ 'O seu Carrinho' }}</h3>
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
                <!-- Order Details -->
                <div class="col-md-12 order-details">
                    <div class="order-summary">
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">
                                            DESIGNAÇÃO
                                        </th>
                                        <th style="width: 20%">
                                            QUANTIDADE
                                        </th>
                                        <th style="width: 20%">
                                            PREÇO
                                        </th>

                                        <th style="width: 20%">
                                            OPERAÇÕES
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (count($itensCarrinho) > 0)
                                        @foreach ($itensCarrinho as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->nome }}
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $item->quantidade }}
                                                    </a>
                                                </td>

                                                <td>
                                                    <a>
                                                        {{ number_format($item->preco, 2, ',', '.') }} {{ 'AOA' }}
                                                    </a>
                                                </td>

                                                <td>
                                                    <form action="{{ route('web.carrinho.removerItem') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="item_id"
                                                            value="{{ $item->carrinho_item_id }}">
                                                        <button type="submit" class="btn btn-dark">Remover</button>
                                                    </form>
                                                </td>  
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan="12" class="text-muted">
                                            <p class="text-center">O seu Carrinho está vazio...</p>
                                        </td>
                                    @endif
                                </tbody>
                            </table>
                            <div class="container">
                                <div class="row">
                                    <b>Subtotal: </b> {{ number_format($precoTotalCarrinho, 2, ',', '.') }}
                                    {{ 'AOA' }}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <a href="{{route('web.checkout.index')}}" class="primary-btn order-submit">Realizar Checkout</a>
                    {{-- <div class="row">
                        <form action="">
                            <button type="btn" class="primary-btn order-submit">Realizar Checkout</button>
                        </form>
                    </div> --}}
                </div>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
