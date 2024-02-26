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
                <!-- Order Details -->
                <div class="col-md-12 order-details">
                    <div class="order-summary">
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">
                                            #PRODUTO
                                        </th>
                                        <th style="width: 20%">
                                            DESCRICAO
                                        </th>
                                        <th style="width: 25%">
                                            QTD
                                        </th>

                                        <th style="width: 5%" class="text-center">
                                            TOT
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($itensPedido as $item)

                                        <tr>
                                            <td>
                                                # <a href="">{{ $item->nome }}</a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $item->descricao }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{$item->quantidade }}
                                                </a>
                                            </td>

                                            <td>
                                                <a>
                                                    {{$item->preco }}
                                                </a>
                                            </td>

                                            <td>
                                                <a>
                                                    {{-- {{ number_format($pedido->total, 2, ',', '.') }} {{ 'AOA' }} --}}
                                                </a>
                                            </td>

                                        </tr>



                                    @empty


                                        <td colspan="12" class="text-muted">
                                            <p class="text-center">Nenhum item encontrado...</p>
                                        </td>
                                    @endforelse
                                </tbody>


                            </table>

                            <div>
                                <span>Total pedido: <b>  {{ number_format($totalPedido, 2, ',', '.') }} {{ 'AOA' }} </b> (Kzs)</span>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
