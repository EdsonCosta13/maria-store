
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="{{route('web.index')}}">Home</a></li>
						<li><a href="{{route('web.about')}}">Quem Somos</a></li>
						<li><a href="{{route('web.contact')}}">Contactos</a></li>
						{{-- <li><a href="#">Blog</a></li> --}}
                        {{-- <li class="{{ $cur_url== 'web.loja'?'active' : '' }}"><a href="{{route('web.loja')}}">Loja</a></li> --}}
                        <li class="{{Request::is('web.loja')?'active':'';}}"><a href="{{route('web.loja')}}">Loja</a></li>
                        <li><a href="#">Mais vendidos</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
