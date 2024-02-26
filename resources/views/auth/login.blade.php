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
        <div class="container clearfix">
            <div class="row">
                <div class="text-center">
                    <h4>{{$description_page}}</h4>
                </div>
            </div>
            <form action="{{route('auth.authenticate')}}" method="post">
                @method('post')
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Entra com o email" name="email" value="{{old('email')}}" pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Enter a valid email address">
                            </div>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Palavra-passe</label>
                                <input type="password" class="form-control" id="exampleInputEmail1"
                                    placeholder="Entra com a palavra-passe" name="password" value="{{old('password')}}">
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
                            class="btn btn-raised  waves-effect float-right btn-primary ml-2">Entrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
