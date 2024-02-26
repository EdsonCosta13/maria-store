@extends('web.layouts.app')
@section('content')

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">{{$page_title}}</h3>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categorias</h3>
							@foreach ($categories as $categorie)

                            <div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="category-6">
									<label for="category-6">
										<span></span>
										<a href="#">{{$categorie->designacao}}</a>
										<small>(740)</small>
									</label>
								</div>
							</div>

                            @endforeach
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Preço</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Filtrar Por:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Mostrar:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
                            @forelse ($products as $product)

                            							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
                                        <img src="{{ asset('images/products/' .$product->imagem_nome)}}">
										<div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">{{$product->categoria}}</p>
										<h3 class="product-name"><a href="#">{{$product->nome}}</a></h3>
										<h4 class="product-price">{{ number_format($product->preco, 2, ',', '.') }} {{'AOA'}}</h4>
										<div class="product-btns">
											<a class="quick-view" href="{{route('web.product',[$product->produto_id])}}"><i class="fa fa-eye"></i><span class="tooltipp">Ver</span></a>
										</div>
									</div>
									<div class="">
                                        <form action="{{route('web.carrinho.addProduct',[$product->produto_id])}}" method="post">
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="produto_id" value="{{ $product->produto_id }}">
                                            <div class="add-to-cart">
                                                <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Adicionar</button>
                                            </div>
                                        </form>
                                    </div>
								</div>
							</div>
							<!-- /product -->

							<div class="clearfix visible-sm visible-xs"></div>

                            @empty
                            <td colspan="12" class="text-muted">
                                <p class="text-center">Sem nenhum registro...</p>
                            </td>
                            @endforelse
						</div>
						<!-- /store products -->

						{{--<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->--}}
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection
