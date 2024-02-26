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
                                            #REFERÊNCIA
                                        </th>
                                        <th style="width: 20%">
                                            DATA
                                        </th>
                                        <th style="width: 20%">
                                            HORA
                                        </th>

                                        <th style="width: 20%" class="text-center">
                                            ESTADO
                                        </th>
                                        <th style="width: 20%">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pedidos as $pedido)

                                        <tr>
                                            <td>
                                                # {{ $pedido->referencia }}
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $pedido->data }}
                                                </a>
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $pedido->hora }}
                                                </a>
                                            </td>

                                            <td>
                                                <a>
                                                    {{ 'Concluído' }}
                                                </a>
                                            </td>

                                            <td>
                                                <a>
                                                    {{ number_format($pedido->total, 2, ',', '.') }} {{ 'AOA' }}
                                                </a>
                                            </td>

                                        </tr>

                                    @empty


                                        <td colspan="12" class="text-muted">
                                            <p class="text-center">Nenhum pedido feito...</p>
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
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
