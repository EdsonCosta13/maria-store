  <!-- HEADER -->
  <header>
  <!-- TOP HEADER -->
  <div id="top-header">
  <div class="container">
  <ul class="header-links pull-left">
  <li><a href="#"><i class="fa fa-phone"></i> +244 923723275</a></li>
  <li><a href="#"><i class="fa fa-envelope-o"></i> umastore@email.com</a></li>
  <li><a href="#"><i class="fa fa-map-marker"></i> Luanda,Mutamba</a></li>
  </ul>
  <ul class="header-links pull-right">

    @guest
    <li><a href="{{route('auth.loginGet')}}"><i class="fa fa-user-o"></i>Login</a></li>
    <li><a href="{{ route('web.cliente.create') }}"><i class="fa fa-user-o"></i>Registro</a></li>
    @endguest


  @auth
  <li><a href="{{route('web.cliente.index')}}"><i class="fa fa-user-o"></i> Minha conta</a></li>
  <li><a href="{{route('web.pedido.index')}}"><i class="fa fa-user-o"></i>Meus pedidos</a></li>
  <li><a href="{{route('auth.logout')}}"><i class="fa fa-user-o"></i>Logout</a></li>
  <li><a href="#"><i class="fa fa-user-o"></i>

    {{Auth::user()->email}}
    </a>
  </li>

  @endauth

  </ul>
  </div>
  </div>
  <!-- /TOP HEADER -->

  <!-- MAIN HEADER -->
  <div id="header">
  <!-- container -->
  <div class="container">
  <!-- row -->
  <div class="row">
  <!-- LOGO -->
  <div class="col-md-3">
  <div class="header-logo">
  <a href="#" class="logo">
  <img src="{{ asset('web/img/logo.png') }}" alt="">
  </a>
  </div>
  </div>
  <!-- /LOGO -->

  <!-- SEARCH BAR -->
  <div class="col-md-6">
  <div class="header-search">
  <form>
  {{-- <select class="input-select">
  <option value="0">Categorias</option>
  <option value="1">Categoria 01</option>
  <option value="1">Categoria 02</option>
  </select> --}}
  <input class="input" placeholder="Search here">
  <button class="search-btn">Busca</button>
  </form>
  </div>
  </div>
  <!-- /SEARCH BAR -->

  <!-- ACCOUNT -->
  <div class="col-md-3 clearfix">
  <div class="header-ctn">
  <!-- Cart -->
  <div class="dropdown">
  <a class="" href="{{ route('web.cart.index') }}">
  <i class="fa fa-shopping-cart"></i>
  <span>Carrinho</span>
  {{-- <div class="qty">3</div> --}}
  </a>

  </div>
  <!-- /Cart -->

  <!-- Menu Toogle -->
  <div class="menu-toggle">
  <a href="#">
  <i class="fa fa-bars"></i>
  <span>Menu</span>
  </a>
  </div>
  <!-- /Menu Toogle -->
  </div>
  </div>
  <!-- /ACCOUNT -->
  </div>
  <!-- row -->
  </div>
  <!-- container -->
  </div>
  <!-- /MAIN HEADER -->
  </header>
  <!-- /HEADER -->
