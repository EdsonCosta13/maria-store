@extends('web.layouts.app')
@section('content')

<style>
    .sidenav {
        height: 500px;
        background-color: #000;
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        height: 500px;
        padding: 0px 10px;
        display: flex;
        /* background-color: red; */
        justify-content: center;
        align-items: center;
    }


    .login-main-text {
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .login-main-text h2 {
        font-weight: 300;
    }

    .btn-black {
        background-color: #000 !important;
        color: #fff;
    }
</style>
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
    <div class="container clearfix">


        <!-- <div class="row">
            <div class="text-center">
                <h4>{{$description_page}}</h4>
            </div>
        </div> -->


        <div class="row">
            <div class="sidenav col-sm-12 col-md-6">
                <div class="login-main-text">
                    <h2>RestauDelicias<br> Página de Login</h2>
                    <p>Login para o acesso.</p>
                </div>
            </div>
            <div class="main col-sm-12 col-md-6">
                <div class="col-md-6 col-sm-12">
                    <div class="login-form">

                        <form action="{{route('auth.authenticate')}}" method="post" style="display: flex; flex-direction: column; height: 100%;">
                            @method('post')
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Entra com o email" name="email" value="{{old('email')}}" pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Enter a valid email address">
                                </div>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Palavra-passe</label>
                                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Entra com a palavra-passe" name="password" value="{{old('password')}}" minlength="4" maxlength="80" title="Deve ter no mínimmo 4 caracteres, no máximo 80!">
                                </div>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-raised btn-black waves-effect float-right btn-primary ml-2">Entrar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
