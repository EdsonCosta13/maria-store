@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $page_title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pace</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            {{-- <div class="row">
                <div class="col-12 clearfix">
                    <a href="#" class="btn btn-raised  waves-effect  btn-primary ml-2 my-3">Novo produto</a>
                </div>
            </div>
            <!-- /.card --> --}}

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $page_description }}</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 25%">
                                    #PRODUTO

                                </th>
                                <th style="width: 25%">
                                    DESCRICAO
                                </th>
                                <th style="width: 25%">
                                    QTD
                                </th>

                                <th style="width: 5%" class="text-center">
                                    PREÇO
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
                                            {{ $item->quantidade }}
                                        </a>
                                    </td>

                                    <td>
                                        <a>
                                            {{-- {{ $item->preco }} --}}
                                            {{ number_format($item->preco, 2, ',', '.') }} {{ 'AOA' }} / Produto
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
                    <div class="container mt-3">
                        <span>Total pedido: <b> {{ number_format($totalPedido, 2, ',', '.') }} {{ 'AOA' }} </b>
                            (Kzs)</span>
                    </div>
                </div>
                <!-- /.card-body -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
@endsection
