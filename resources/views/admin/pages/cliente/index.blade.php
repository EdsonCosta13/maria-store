@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestão de Clientes</h1>
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

            <!-- Default box -->
            <div class="row">
                <div class="col-12 clearfix">
                    <a href="#"
                        class="btn btn-raised  waves-effect  btn-primary ml-2 my-3">Novo Cliente</a>
                </div>
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Todos os Clientes</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 15%">
                                    #ID

                                </th>
                                <th style="width: 20%">
                                    Nome Completo
                                </th>
                                <th style="width: 15%">
                                    Telefone
                                </th>

                                <th style="width: 15%" class="text-center">
                                    Data Registro
                                </th>
                                <th style="width: 15%" class="text-center">
                                    N.Compras Feitas
                                </th>
                                <th style="width: 20%">
                                    Operações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                                <tr>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar"
                                                    src="{{ asset('admin/dist/img/avatar.png') }}">
                                            </li>

                                        </ul>
                                    </td>
                                    <td>
                                        <a>
                                            {{ $client->pessoa->primeiro_nome }} {{ $client->pessoa->sobrenome }}
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            {{ $client->pessoa->telefone }}
                                        </a>
                                    </td>

                                    <td class="project-state">
                                        <span class="badge badge-success">{{ $client->pessoa->created_at}}</span>
                                    </td>
                                    <td class="project-state">
                                        <span class="badge badge-success">{{''}}</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            Ver
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Excluir
                                        </a>
                                    </td>
                                </tr>


                            @empty

                                <td colspan="12" class="text-muted">
                                    <p class="text-center">Sem nenhum registro...</p>
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
