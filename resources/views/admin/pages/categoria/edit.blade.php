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
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">Adicionar Categoria</h3> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', [$category->categoria_id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="" placeholder=""
                                        name="designacao" value="{{ $category->designacao }}">
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
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
@endsection
