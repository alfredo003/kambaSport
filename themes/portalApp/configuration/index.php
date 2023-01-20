<?php $v->layout("_theme"); ?>
 
<!-- Main Content -->
<div id="content">

 

  <!-- Begin Page Content -->
  <div class="container-fluid">

  
    <!-- Content Row -->
    <div class="row">


      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white h-100 py-2">
        <a href="<?=url('config/modalidade')?>" style="text-decoration:none;" >  
        <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-white text-uppercase mb-1">Modalidade</div>
                <div class="text-xs mb-0 font-weight-bold text-white ">Gestão de Modalidade </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-plus-circle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div></a>
        </div>
      </div>
     
      
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white h-100 py-2">
        <a href="<?=url('config/employee')?>" style="text-decoration:none;" >  
        <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-white text-uppercase mb-1">Funcionário</div>
                <div class="text-xs mb-0 font-weight-bold text-white ">Controle de Funcionarios </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-archive fa-2x text-gray-300"></i>
              </div>
            </div>
          </div></a>
        </div>
      </div>
 <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white h-100 py-2">
        <a href="<?=url('config/planos')?>" style="text-decoration:none;" >  
        <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-white text-uppercase mb-1">PLANOS</div>
                <div class="text-xs mb-0 font-weight-bold text-white ">Planos de assinatura </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div></a>
        </div>
      </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white h-100 py-2">
        <a href="<?=url('app/buscar-cliente')?>" style="text-decoration:none;" >  
        <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class=" font-weight-bold text-white text-uppercase mb-1">BACKUP</div>
                <div class="text-xs mb-0 font-weight-bold text-white ">Fezer copia de segurança </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-download fa-2x text-gray-300"></i>
              </div>
            </div>
          </div></a>
        </div>
      </div>

    
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-cog"></i> | Estado Geral do Sistema </h6>
          
          </div>
          <!-- Card Body -->
          <div class="card-body">
            
          <div class="table-responsive">
                                <table class="table table-striped" style="font-family:calibri;">
                                   
                                    <tr>
                                            <th>Nome da Licensa :</th>
                                           
                                            <th><?=$sport->name?></th>
                                        </tr>
                                        <tr>
                                            <th>Nº Funcionários :</th>
                                            <th><?=$n_employee?></th>
                                           
                                        </tr>
                                        <tr>
                                            <th>Nº de Clientes :</th>
                                            <th><?=$n_costumer?></th>
                                           
                                        </tr>
                                        <tr>
                                            <th>Valor do Caixa</th>
                                            <th>---</th>
                                         
                                        </tr>
                                        <tr>
                                            <th>---</th>
                                            <th>---</th>
                                          
                                        </tr>
                                        <tr>
                                            <th>Fim da Lincesa</th>
                                            <th><?=$sport->data_fim?></th>
                                      
                                        </tr>
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
