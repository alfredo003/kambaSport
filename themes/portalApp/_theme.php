<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?=$head?>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="<?=theme('assets/img/icon.svg')?>" sizes="32x32">
  <link href="<?=theme('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=theme('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="<?=theme("assets/style.css")?>">
  <link rel="stylesheet" href="<?=theme("assets/css/styles/styles.css")?>">
  <?= $v->section("css"); ?>
</head>

<body id="page-top">
<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <div class="ajax_load_box_title">Aguarde, carregando!</div>
    </div>
</div>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=url('/')?>">
        <div class="sidebar-brand-icon rotate-n-15">
         <img src="<?=theme('assets/img/icon_vertical_white.svg')?>" alt="" style="width:24px;">
        </div>
        <div class="sidebar-brand-text mx-3">KSport</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?=(($active == "home")?"active":"")?>">
        <a class="nav-link" href="<?=url('app/')?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Pagina Incial</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Controle
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?=(($active == "cliente")?"active":"")?>" >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Clientes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Controle de Clientes</h6>
            <a class="collapse-item" href="<?=url('app/novo-cliente')?>">Novo Cliente</a>
            <a class="collapse-item" href="<?=url('app/lista-cliente')?>">Lista de Cliente</a>
            <a class="collapse-item" href="<?=url('app/mensalidade')?>">Pagamentos</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?=(($active == "presenca")?"active":"")?>" >
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo1">
          <i class="fas fa-fw fa-calendar-check"></i>
          <span>Livro de Ponto</span>
        </a>
        <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Livro de ponto</h6>
            <a class="collapse-item" href="<?=url('app/lista-presenca')?>">Confirmar presença</a>
            <a class="collapse-item" href="<?=url('app/lista-book')?>">Arquivo de presença</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

<div class="sidebar-heading">
  TESORARIA
</div>

<li class="nav-item <?=(($active == "config")?"active":"")?>">
  <a class="nav-link" href="<?=url('config')?>">
    <i class="fas fa-dollar-sign"></i>
    <span>Gestão Dispesas</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item <?=(($active == "config")?"active":"")?>">
  <a class="nav-link" href="<?=url('config')?>">
    <i class="fas fa-fw fa-clipboard-list"></i>
    <span>Resumo Facturação</span></a>
</li>


  


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline"  >
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

   <!-- Topbar -->
   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>



<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell fa-fw"></i>
      <!-- Counter - Alerts -->
      <span class="badge badge-danger badge-counter"><?=!empty($alert_c)?$alert_c:""?></span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
      <h6 class="dropdown-header">
      Notificações
      </h6>
      <?php if(empty($alerts)):?>
        <div class="small text-gray-500">Nenhuma Nova Notificação</div>
      <?php else:?>
      <?php foreach($alerts as $alert):?>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="mr-3">
          <div class="icon-circle bg-primary">
            <i class="fas fa-file-alt text-white"></i>
          </div>
        </div>
        <div>
     <div class="small text-gray-500">December 12, 2019</div>
          <span class="font-weight-bold">A new monthly report is ready to download!</span>
        </div>
      </a>
      <?php endforeach; endif;?>
   
     
      <a class="dropdown-item text-center small text-gray-500" href="#">Ver Todas Notificações</a>
    </div>
  </li>


  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= user()->first_name; ?> <?= user()->last_name; ?></span>
      <img class="img-profile rounded-circle" src="<?=theme('assets/img/user.jpg')?>">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="<?=url('users/profile')?>">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Meu Perfil
      </a>
      <a class="dropdown-item" href="<?=url('users/index')?>">
        <i class="fas fa-sitemap fa-sm fa-fw mr-2 text-gray-400"></i>
        Utilizadores
      </a>
      <a class="dropdown-item" href="<?=url('config')?>">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Configurações
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="*" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Terminar
      </a>
    </div>
  </li>

</ul>

</nav>
<!-- End of Topbar -->
    <main>
<?= $v->section("content")?>
    </main>
 

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
    <h5 class="modal-title" id="exampleModalLabel">Ola! <?= user()->first_name; ?></h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Tem a certesa que desejas terminar a conta?</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
    <a class="btn btn-primary" href="<?= url("/app/sair"); ?>">Sair</a>
  </div>
</div>
</div>
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="<?=theme('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?=theme('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=theme('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=theme('assets/js/sb-admin-2.min.js')?>"></script>

  <!-- Page level plugins -->
  <script src="<?=theme('assets/vendor/chart.js/Chart.min.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?=theme('assets/js/demo/chart-area-demo.js')?>"></script>
  <script src="<?=theme('assets/js/demo/chart-pie-demo.js')?>"></script>
<script src="<?=theme('assets/scripts.js')?>"></script>


<?= $v->section("js"); ?>
</body>

</html>
