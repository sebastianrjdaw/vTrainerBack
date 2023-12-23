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
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-volleyball-ball"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Voley Trainer</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->

        <div class="container-fluid">

          <!-- Page Heading -->


          <div class="container container-md mt-4">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Bienvenido a Voley-Trainer </h3>
              </div>
              <div class="card-body">
                <h6>Bienvenido al Gestor de Entrenamientos, que deseas hacer?</h6>
                <a href="{{route('login')}}" class="btn btn-primary">Iniciar Sesion</a>
                <a href="{{route('register')}}" class="btn btn-success">Registrase</a>

              </div>
            </div>
          </div>
        </div>

        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    

    
    

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