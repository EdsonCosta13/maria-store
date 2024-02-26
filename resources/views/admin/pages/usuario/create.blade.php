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
                        <form action="{{ route('admin.utilizador.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Primeiro Nome</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Nome" name="primeiro_nome"
                                                title="Não conter caracteres especias ou números!" pattern="[A-Za-zÀ-ÖØ-öø-ÿ]+">
                                        </div>
                                    </div>
                                </div>

                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sobrenome</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Sobrenome" name="sobrenome"
                                                title="Não conter caracteres especias ou números!" pattern="[A-Za-zÀ-ÖØ-öø-ÿ]+">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nível Acesso</label>
                                        <select class="form-control select2" style="width: 100%;" name="role_id">
                                            @foreach ($roles as $role)
                                                @if ($role->nome != 'Cliente')
                                                    <option value="{{ $role->id }}">
                                                        {{ $role->nome }}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefone</label>
                                            <input type="text" class="form-control" id=""
                                                placeholder="Telefonel" name="telefone"
                                                title="Insira um número de telefone válido!" pattern="[0-9]+">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" class="form-control" id="" placeholder="Email" name="email"
                                            pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Digite um email válido">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputEmail1"
                                                placeholder="Password" name="password"
                                                minlength="4" maxlength="255" title="Deve ter no mínimmo 4 caracteres, no máximo 255!">
                                        </div>
                                    </div>
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
