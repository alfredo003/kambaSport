<?php $v->layout('_theme')?>
<?php $v->start('css')?>
<link href="<<?=theme('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
<?php $v->end()?>
<div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
 
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" style="font-family:calibri;">
        <thead>
          <tr>
     
            <th>ID</th>
            <th>Nome</th>
            <th>Contacto</th>
            <th>Modalidade</th>
            <th>Plano</th>
            <th>Config</th>
          </tr>
        </thead>
      
     <tbody>
  <?php $i=0;if(!empty($costumers)): foreach($costumers as $costumer):?>

    <tr>
    <td><?=$costumer->IDcode?></td>
    <td><?="{$costumer->people()->first_name} {$costumer->people()->last_name} "?></td>
    
    <td><?=$costumer->Contact()->tel?></td>
    <td><?=$costumer->subscription()->modality()->name?></td>
    <td>
            <span class="badge bg-info rounded" style="color:#fff;"><?=$costumer->subscription()->plan()->name?> (<?=$costumer->subscription()->plan()->period_str?>)   &nbsp;  &nbsp; <i class="fa fa-calendar-week"></i></span>
        
    </td>
  
    <td>
       <a class="text-danger"  style="border-radius:0;" href="<?=url("app/historico-cliente/{$costumer->IDcode}")?>"><i class="fa fa-history"></i> Histórico</a>
       <!--<a class="btn btn-info text-white"  style="border-radius:0;"><i class="fa fa-money-check-alt"></i> Pagar</a>
        --></td>  
    

    

<!-- Logout Modal-->
<div class="modal fade" id="deleteModality-<?=$modality->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> <?=$modality->name?> <i class="fa fa-user"></i></h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<?=flash()?>
<form action="<?=url('config/modalidade')?>" method="post">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?=$modality->id?>">
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