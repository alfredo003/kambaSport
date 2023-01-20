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
            <th>Estado</th>
            <th>Plano</th>
            <th>Config</th>
          </tr>
        </thead>
      
     <tbody>
  <?php $i=0;if(!empty($costumers)): foreach($costumers as $costumer):?>

    <tr>
    <td><?=$costumer->IDcode?></td>
    <td><?="{$costumer->people()->first_name} {$costumer->people()->last_name}"?></td>
    
    <td><?=$costumer->Contact()->tel?></td>
    <td><?=$costumer->status?></td>
    <td>
    <span class="badge bg-info rounded" style="color:#fff;"><?=$costumer->subscription()->plan()->name?> (<?=$costumer->subscription()->plan()->period_str?>)   &nbsp;  &nbsp; <i class="fa fa-calendar-week"></i></span>
        
    </td>
  
    <td>
       <a class="btn btn-primary" data-toggle="modal" data-target="#viewCostumer<?=$costumer->IDcode?>" style="border-radius:0;" href="<?=url("app/historico-cliente/{$costumer->IDcode}")?>"><i class="fa fa-money-bill-alt"></i> PAGAR</a>
       <!--<a class="btn btn-info text-white"  style="border-radius:0;"><i class="fa fa-money-check-alt"></i> Pagar</a>
        --></td>  
    

<!-- Modal view costumer-->
<div class="modal fade" id="viewCostumer<?=$costumer->IDcode?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-user"> </i> 
 [<?=$costumer->IDcode?>] <?="{$costumer->people()->first_name} {$costumer->people()->last_name}"?>
</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<?=flash()?>
<form action="<?=url('app/mensalidade-payment')?>" method="post">
<input type="hidden" name="action" value="update">
<input type="hidden" name="idcode" value="<?=$costumer->IDcode?>">
<input type="hidden" name="id" value="<?=$costumer->subscription()->id?>">
<div class="modal-body">
<div class="form-group mb-4">
<div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">ID</label>
                                                        <input  type="text" class="form-control cc-exp" value="<?=$costumer->IDcode?>" disabled>
                                                    </div>
                                                </div>
                   
                                                <div class="col-9">
                                                    <label for="x_card_code" class="control-label mb-1">Plano (Assinatura)</label>
                                                    <div class="input-group">
                                        
                                                        <select name="plan" id="planSelect" class="form-control" style="width:100%;">
                                        <option value="<?=$costumer->subscription()->plan()->id?>"><?=$costumer->subscription()->plan()->name?> </option>
                                       
                                        <?php if(!empty($plans)): foreach($plans as $plan):?>
                                            <option  value="<?=$plan->id?>"><?=$plan->name?></option> 
                                        <?php  endforeach; endif;?>
                                            </select>

                                                    </div>
                                                </div>
                                           
                                    </div>
                                    <div class="row">
                                    <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Modalidade</label>
                                                    <div class="input-group">
                                        
                                                        <select name="modality"  class="form-control cc-cvc" style="width:100%;">
                                                        <option value="<?=$costumer->subscription()->modality()->id?>"><?=$costumer->subscription()->modality()->name?></option>
                                                       <?php if(!empty($list_modality)): 
                                            foreach($list_modality as $modality):
                                        ?>
                                        <option value="<?=$modality->id?>"><?=$modality->name?></option>
                                        <?php
                                        endforeach;
                                        endif;
                                        ?>
                                            </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Tipo Pagamento</label>
                                                    <div class="input-group">
                                        
                                         <select name="type_payment"  class="form-control cc-cvc" style="width:100%;">
                                        <option value="Cash">Em Cash</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="TPA">TPA</option>
                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Valor(kwanza)</label>
                                                    <div class="input-group">
                                                        <input type="text" id="price_val" class="form-control cc-cvc" value="<?=$costumer->subscription()->plan()->price?>" disabled>

                                                    </div>
                                                </div>
                                                
                                           
                                    </div>
                           
</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
<button class="btn btn-success">Pagar</button>
</div>
</div>
</form>
</div>
</div>
                                  
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



  
  <?php $v->start("js"); ?>    
    <!-- Page level plugins -->
    <script src="<?=theme('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?=theme('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?=theme('assets/js/demo/datatables-demo.js')?>"></script>        
  <script>
  
 var plan =  document.querySelector("#planSelect");
 var price =  document.querySelector("#price_val");
 plan.addEventListener('change',()=>{
    $.ajax({
        url: '<?=url('config/teste')?>',
        type: 'POST',
        data: {
          id: plan.value
        },
        beforeSend: function(params) {
            
        },
        success: function(data) {
        
          price.value=data;
        },
        error: function(data) {
         
            console.log("Houve um erro");
        }
      });
 });
 
  </script>
<?php $v->end(); ?>