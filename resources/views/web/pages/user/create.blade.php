@extends('web.layouts.app')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">{{ 'Registro de Cliente' }}</h3>
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
        <div class="container clearfix">
            <form action="{{ route('web.cliente.store') }}" method="post">
                @method('post')
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Primeiro Nome</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Nome" name="primeiro_nome" value="{{ old('primeiro_nome') }}"
                                    title="Não conter caracteres especias ou números!" pattern="[A-Za-zÀ-ÖØ-öø-ÿ]+">
                            </div>
                            @if ($errors->has('primeiro_nome'))
                                <span class="text-danger">{{ $errors->first('primeiro_nome') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sobrenome</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Sobrenome"
                                    name="sobrenome" value="{{ old('sobrenome') }}"
                                    title="Não conter caracteres especias ou números!" pattern="[A-Za-zÀ-ÖØ-öø-ÿ]+">
                            </div>
                            @if ($errors->has('sobrenome'))
                                <span class="text-danger">{{ $errors->first('sobrenome') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Telephone" name="telefone" value="{{ old('telefone') }}"
                                    title="Insira um número de telefone válido!" pattern="[0-9]+">
                            </div>
                            @if ($errors->has('telefone'))
                                <span class="text-danger">{{ $errors->first('telefone') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                                    name="email" value="{{ old('email') }}" pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Digite um email válido">
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Palavra-passe</label>
                                <input type="password" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Password" name="password" value="{{ old('password') }}"
                                    minlength="4" maxlength="255" title="Deve ter no mínimmo 4 caracteres, no máximo 255!">
                            </div>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 ">
                            <button type="submit"
                                class="btn btn-raised  waves-effect float-right btn-primary ml-2">SALVAR</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
