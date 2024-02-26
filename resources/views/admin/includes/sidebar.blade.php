 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="../../index3.html" class="brand-link">
         {{-- <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
         <span class="brand-text font-weight-light">RestauDelicias</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 {{-- <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
             </div>
             <div class="info">
                 <a href="#" class="d-block">CMS RestauDelicias</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview">
                     <a href="{{ route('admin.painel') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Painel
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.category.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Gestão de Categorias
                         </p>
                     </a>
                 </li>
                 {{-- Menu produtos --}}
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tree"></i>
                         <p>
                             Gestão de Produtos
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.product.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Todos</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.product.create') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Adicionar</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('admin.venda.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Gestão de Vendas

                         </p>
                     </a>
                 </li>


                 @if (Auth::user()->hasRole('Admin'))
                     {{-- Menu clientes --}}
                     <li class="nav-item has-treeview">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-tree"></i>
                             <p>
                                 Gestão de Clientes
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('admin.client.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Todos</p>
                                 </a>
                             </li>
                             {{-- <li class="nav-item">
                                 <a href="{{ route('admin.client.create') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Adicionar</p>
                                 </a>
                             </li> --}}
                         </ul>
                     </li>



                     {{-- Menu usuarios --}}
                     <li class="nav-item has-treeview">
                         <a href="" class="nav-link">
                             <i class="nav-icon fas fa-tree"></i>
                             <p>
                                 Gestão de Utilizadores
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('admin.utilizador.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Todos</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('admin.utilizador.create') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Adicionar</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 @endif



                 <li class="nav-item">
                     <form action="{{route('auth.logout')}}" method="get">
                        @method('Get')
                        @csrf
                         <button class="btn btn-danger" type="submit">
                            Terminar Sessão
                         </button>
                     </form>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
