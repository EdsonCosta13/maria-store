@extends('web.layouts.app')
@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">{{ 'O seu Carrinho' }}</h3>
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
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Order Details -->
					<div class="col-md-12 order-details">
						<div class="order-summary">
                            <div class="card-body p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%">
                                                #IMG
                                            </th>
                                            <th style="width: 20%">
                                                PRODUTO
                                            </th>
                                            <th style="width: 20%">
                                                QUANTIDADE
                                            </th>

                                            <th style="width: 20%" class="text-center">
                                                SUBTOTAL
                                            </th>
                                            <th style="width: 20%">
                                                Operações
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td colspan="12" class="text-muted">
                                            <p class="text-center">O seu Carrinho está vazio...</p>
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
						</div>
						<a href="#" class="primary-btn order-submit">Place order</a>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
