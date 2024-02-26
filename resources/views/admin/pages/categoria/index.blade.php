@extends('admin.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$page_title}}</h1>
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
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Adicionar Categoria</h3> --}}
                </div>
                <div class="card-body">
                    <form action="{{route('admin.category.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder="" name="designacao">
                                </div>
                                @if ($errors->has('designacao'))
                                <span class="text-danger">{{ $errors->first('designacao') }}</span>
                            @endif
                            </div>
                        </div>
                        <div class="col-12 clearfix">
                            <button type="submit"
                                class="btn btn-raised  waves-effect float-right btn-primary ml-2">SALVAR</button>
                        </div>
                    </form>
                </div>
                {{-- <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer--> --}}
            </div>
            <!-- /.card -->

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Todas Categorias</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 20%">
                                    #ID
                                </th>
                                <th style="width: 20%">
                                    Designação
                                </th>
                                <th style="width: 20%">
                                    Data Registo
                                </th>

                                <th style="width: 20%" class="text-center">
                                    Status
                                </th>
                                <th style="width: 20%">
                                    Operações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $categorie)

                            <tr>
                                <td>
                                    # {{$categorie->categoria_id}}
                                </td>
                                <td>
                                    <a>
                                        {{$categorie->designacao}}
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        {{$categorie->created_at}}
                                    </a>
                                </td>

                                <td class="project-state">
                                    <span class="badge badge-success">Activa</span>
                                </td>
                                <td class="project-actions text-right">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="btn btn-info btn-sm" href="{{route('admin.category.edit',[$categorie->categoria_id])}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>

                                            </a>
                                        </div>


                                        <div class="col-md-4">
                                            <form action="{{route('admin.category.destroy',[$categorie->categoria_id])}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" >
                                                    <i class="fas fa-trash">
                                                    </i>

                                                </button>
                                            </form>
                                        </div>

                                    </div>
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
