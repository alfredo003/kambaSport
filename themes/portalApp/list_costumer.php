<?php $v->layout('_theme')?>
<?php $v->start('css')?>
<link href="<<?=theme('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
<?php $v->end()?>
<div class="container-fluid">

<div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Controle de Cliente</div>
                    </div>
                 
                  </div>   
                </div>
              </div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Nº Cliente : <?=$n_costumer?> | Nº Bloqueado : <?=$n_costumer_block?> </h6>
  </div>
  
  <div class="card-body"> <a href="#" class="btn-warning"><small><i class="fa fa-print"></i> Imprimir</small></a>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-family:calibri;">
        <thead>
          <tr>
          <th>#</th>
            <th>ID</th>
            <th>Nome/Apelido</th>
            <th>Genero</th>
            <th>Contacto</th>
            <th>Modalidade</th>
            <th>Estado</th>
            <th>Config</th>
          </tr>
        </thead>
        <tfoot>
        <th>#</th>
            <th>ID</th>
            <th>Nome/Apelido</th>
            <th>Genero</th>
            <th>Contacto</th>
            <th>Modalidade</th>
            <th>Estado</th>
            <th>Config</th>
      
        </tfoot>
     <tbody>
  <?php $i=0;if(!empty($costumers)): foreach($costumers as $costumer):?>

    <tr>
    <td>
    <?php
    
    $i++;
    ?>
    <?=$i?>
    </td>
    <td><?=$costumer->IDcode?></td>
    <td><?="{$costumer->people()->first_name} {$costumer->people()->last_name}"?></td>
    <td>
        <?php if($costumer->people()->gender == 'Masculino'):?> 
        <span> <b>M</b> <i class="fa fa-male"></i></span>
        <?php else:?>
            <span> <b>F</b> <i class="fa fa-female"></i></span>
       
            <?php endif;?>
    </td>
    <td><?=$costumer->Contact()->tel?></td>
    <td><?=$costumer->subscription()->modality()->name?></td>
    <td>
        <?php if($costumer->status == 'Activo'):?> 
        <span class="badge bg-success rounded" style="color:#fff;"><?=$costumer->status?> <i class="fa fa-check-circle"></i></span>
        <?php else:?>
            <span class="badge bg-danger rounded" style="color:#fff;"><?=$costumer->status?> <i class="fa fa-calendar-times"></i></span>
            <?php endif;?>
    </td>
    <td> 
        
  
        <a class="text-danger" data-toggle="modal" data-target="#" style="border:none;"><i class="fa fa-trash-alt"></i></a>
        |   <a class="text-success" data-toggle="modal" data-target="#" style="border:none;"><i class="fa fa-pencil-alt"></i></a>
        |     <a class="text-primary" href="<?=url("app/historico-cliente/{$costumer->IDcode}")?>"><i class="fa fa-eye"></i></a>
    </td>  
    

    

<!-- Modal view costumer-->
<div class="modal fade" id="viewCostumer<?=$costumer->IDcode?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-user"></i></h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<?=flash()?>
<form action="<?=url('config/modalidade')?>" method="post">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="">
<div class="modal-body">
<div class="form-group mb-4">
</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
<button class="btn btn-danger">Eliminar</button>
</div>
</div>
</form>
</div>
</div>

</tr>
                                  
                                    <?php
                                    endforeach;
                                    endif;
                                    ?>
     </tbody>
      </table>
    </div>
  </div>
</div>

</div>


<?php $v->start('js')?>
  <!-- Page level plugins -->
  <script src="<?=theme('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?=theme('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?=theme('assets/js/demo/datatables-demo.js')?>"></script>
  <?php $v->end()?>