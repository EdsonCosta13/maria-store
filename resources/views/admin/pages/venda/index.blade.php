@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestão de Vendas</h1>
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

            {{--<div class="row">
                <div class="col-12 clearfix">
                    <a href="#" class="btn btn-raised  waves-effect  btn-primary ml-2 my-3">Novo produto</a>
                </div>
            </div>
            <!-- /.card -->--}}

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Todas as Vendas</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 15%">
                                    #REF.

                                </th>
                                <th style="width: 20%">
                                    Data
                                </th>
                                <th style="width: 15%">
                                    Hora
                                </th>

                                <th style="width: 20%">
                                    Operações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pedidos as $pedido)

                            <tr>
                                <td>
                                    <a href="">
                                        # {{ $pedido->referencia }}
                                    </a>
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

                                <td class="">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        Imprimir
                                    </a>
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        Visualizar
                                    </a>

                                    <a class="btn btn-danger btn-sm" href="{{route('admin.venda.destroy',[$pedido->pedido_id])}}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Excluir
                                    </a>
                                </td>
                            </tr>

                            @empty
                            <td colspan="12" class="text-muted">
                                <p class="text-center">Nenhuma venda feita...</p>
                            </td>
                            @endforelse
                        </tbody>
                    </table>
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
