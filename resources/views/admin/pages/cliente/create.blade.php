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
            <div class="container-fluid">

                <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('admin.client.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Primeiro Nome</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="primeiro_nome">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Último Nome</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" name="sobrenome">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefone</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Telephone" name="telefone">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" required
                                                placeholder="Enter email" name="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter email" readonly>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 clearfix">
                                    <button type="submit"
                                    class="btn btn-raised  waves-effect float-right btn-primary ml-2">SALVAR</button>

                                    <a href="" class="btn btn-raised  waves-effect float-right btn-danger ml-2">Cancelar </a>


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
