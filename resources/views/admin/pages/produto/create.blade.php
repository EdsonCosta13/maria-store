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
            <div class="container-fluid">

                <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Categorias</label>
                                        <select class="form-control select2" style="width: 100%;" name="categoria_id">
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->categoria_id }}">
                                                    {{ $categorie->designacao }}
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('categoria_id'))
                                    <span class="text-danger">{{ $errors->first('categoria_id') }}</span>
                                @endif
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Nome do produto" name="nome"
                                                title="Não conter caracteres especias. Começar com letra!" pattern="^(?![0-9])[a-zA-Z0-9].*$">
                                        </div>
                                        @if ($errors->has('nome'))
                                            <span class="text-danger">{{ $errors->first('nome') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Descrição</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="descrição" name="descricao"
                                                title="Não conter caracteres especias. Começar com letra!" pattern="^(?![0-9])[a-zA-Z0-9].*$">
                                        </div>
                                        @if ($errors->has('descricao'))
                                            <span class="text-danger">{{ $errors->first('descricao') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Preço</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                placeholder="" name="preco">
                                        </div>
                                        @if ($errors->has('preco'))
                                            <span class="text-danger">{{ $errors->first('preco') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Quantidade</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                placeholder="" name="quantidade">
                                        </div>
                                        @if ($errors->has('quantidade'))
                                            <span class="text-danger">{{ $errors->first('quantidade') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="exampleInputFile">Imagem Produto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="" name="imagem_id">
                                            <label class="custom-file-label" for="exampleInputFile">Upload Imagem</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('imagem_id'))
                                        <span class="text-danger">{{ $errors->first('imagem_id') }}</span>
                                    @endif
                                </div>

                                <div class="col-12 clearfix">
                                    <button type="submit"
                                        class="btn btn-raised  waves-effect float-right btn-primary ml-2">SALVAR</button>

                                    <a href=""
                                        class="btn btn-raised  waves-effect float-right btn-danger ml-2">Cancelar </a>


                                </div>

                            </div>


                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
@endsection
