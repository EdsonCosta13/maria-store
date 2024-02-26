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

            <!-- Default box -->
            <div class="row">
                <div class="col-12 clearfix">
                    <a href="{{ route('admin.product.create') }}"
                        class="btn btn-raised  waves-effect  btn-primary ml-2 my-3">Novo produto</a>
                </div>
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
                                <th style="width: 15%">
                                    #Imagem

                                </th>
                                <th style="width: 20%">
                                    Nome
                                </th>
                                <th style="width: 15%">
                                    Preço
                                </th>

                                <th style="width: 15%" class="text-center">
                                    Quantidade
                                </th>
                                <th style="width: 15%" class="text-center">
                                    Categoria
                                </th>
                                <th style="width: 20%">
                                    Operações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($images as $image)

                            <td>

                                    <img alt="Avatar" class="table-avatar"
                                        src="{{ asset('images/products/'.$image->nome) }}">

                            </td>

                            @empty

                            @endforelse --}}
                            @forelse ($products as $product)
                                <tr>
                                    <td class="" >
                                        <img src="{{ asset('images/products/' .$product->imagem_nome)}}"
                                        alt="Imagem do Produto" style="width: 80px;height:80px;">
                                    </td>

                                    <td>
                                        <a>
                                            {{ $product->nome }}
                                        </a>
                                    </td>
                                    <td>
                                        <a>
                                            {{ $product->preco }}
                                        </a>
                                    </td>

                                    <td class="project-state">
                                        {{ $product->quantidade }}
                                    </td>
                                    <td class="project-state">
                                        {{$product->categoria }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-folder">
                                                    </i>

                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-info btn-sm" href="{{route('admin.product.edit',[$product->produto_id])}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>

                                                </a>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="{{ route('admin.product.destroy', [$product->produto_id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
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
