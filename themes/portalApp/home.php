<?php $v->layout("_theme"); ?>
 
<!-- Main Content -->
<div id="content">

 

  <!-- Begin Page Content -->
  <div class="container-fluid">

  
    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
         <a href="<?=url('app/novo-cliente')?>" style="text-decoration:none;"> <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Novo Cliente</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">0<?=$n_costumer?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div></a>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        <a href="<?=url('app/buscar-cliente')?>" style="text-decoration:none;">  <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Buscar Cliente</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">&RightArrow;</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-search fa-2x text-gray-300"></i>
              </div>
            </div>
          </div></a>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
        <a href="<?=url('app/mensalidade')?>" style="text-decoration:none;"> <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pagamentos</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div></a>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-success shadow h-100 py-2">
        <a href="<?=url('app/lista-presenca')?>" style="text-decoration:none;"> <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Confirmar Presença</div>
                <div class="text-white"><small>Assinar a presença</small></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-check fa-2x text-white"></i>
              </div>
            </div>
          </div>
        </div></a>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="font-family:calibri;">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-calendar"></i> | Mensalidade pendentes com vencimento esta semana</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
             
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body"> 
         
            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Estado</th>
                                            <th>Config</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                     
                                    </tbody>
                                </table>
                           
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Analise do Sistema</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
           
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
              <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Pagos
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Pedentes
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-info"></i> Não Pagos
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

   

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
