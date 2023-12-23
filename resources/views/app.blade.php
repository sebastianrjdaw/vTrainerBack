<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Voley-Trainer</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/all.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
  <!-- Custom styles for this template-->

  <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- Link del editor de codigo HTML -->
  <script src="//cdn.ckeditor.com/4.20.2/basic/ckeditor.js"></script>
  <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#no-hay-panel-principal">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-volleyball-ball"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Voley Trainer</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/principal">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Principal</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Interface</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseb" aria-expanded="true" aria-controls="collapseb">
        <i class="fas fa-people-group"></i>
          <span>{{ __('mensaje.equipo') }}</span>
        </a>
        <div id="collapseb" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/mi-equipo">Info {{ __('mensaje.equipo') }}</a>
            <a class="collapse-item" href="/verjugadores">{{ __('mensaje.jugadores') }}</a>
            <a class="collapse-item" href="/jornada">{{ __('mensaje.estadisiticas') }}</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-dumbbell"></i>
          <span>{{ __('mensaje.entrenamientos') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/rutina">{{ __('mensaje.rutina') }}</a>
            <a class="collapse-item" href="{{ route('entrenamientos.index') }}">{{ __('mensaje.registroE') }}</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-circle-plus"></i>
          <span>{{ __('mensaje.añadir') }}</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('entrenamientos.create')}}">{{ __('mensaje.entrenamientos') }}</a>
            <a class="collapse-item" href="/nuevajornada">{{ __('mensaje.jornada') }}</a>
            <a class="collapse-item" href="{{route ('jugadorEstadistica.create')}}">{{ __('mensaje.estadJugador') }}</a>

          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider" />
      @if ((null!==Auth::user())&&(Auth::user()->rol=='admin'))


      <!-- Heading -->
      <div class="sidebar-heading">Admin</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Utilidades</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/crearEtiquetas">Crear Etiquetas</a>
            <a class="collapse-item" href="/todosPerfiles">Perfiles</a>
          </div>
        </div>
      </li>
      @endif
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          <li class="nav-item ml-4 dropdown no-arrow">
            
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ __('idioma.language') }} {{ App::getLocale() }} </span>
              <i class="fa-solid fa-language"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('idioma', 'es') }}">
                  {{ __('idioma.spanish') }}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('idioma', 'en') }}" >
                  {{ __('idioma.english') }}
                </a>
              </div>
            </li>
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg')}}" />
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/perfil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesion
                </a>
              </div>
            </li>
          </ul>
        </nav>
        @yield('contenido')
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Voley-Trainer 2023</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Seguro que quieres salir?
            </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Selecciona 'Cerrar Sesion' si de verdad quieres salir.
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
              Cancelar
            </button>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="btn btn-primary" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                Cerrar Sesion</a>

            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="/vendor/jquery/jquery.min.js"></script> -->

    <script src="{{ asset('js/jquery/jquery.min.js')}}"></script>




    <script src="{{ asset('js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="/vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js')}}"></script>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>



    <!-- Page level plugins -->
    <!-- <script src="/vendor/chart.js/Chart.min.js"></script> -->
    <script src="{{ asset('js/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>



</body>

</html>