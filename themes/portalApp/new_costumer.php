<?php $v->layout('_theme')?>


<div class="col-lg-12 col-xlg-12 col-md-12">
<div class="card bg-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-white" style="text-transform:uppercase;">Novo Cliente</div>
                    </div>
                 
                  </div>
                </div>
              </div>
      <form class="form-horizontal" method="post" action="<?=url('app/novo-cliente')?>" enctype="multipart/form-data">
                        <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-address-book"></i> ID CLIENTE: <?=$IDcostumer?> | <i class="fa fa-tag"></i> PREÇO:
                   <input type="text" value="00,00" id="price_val"  class="font-weight-bold text-primary" style="border:none;padding:10px; width:90px; background:transparent;" disabled> kz</h6>
                <input type="hidden" name="IDcode" value="<?=$IDcostumer?>">
                  <div class="dropdown no-arrow">
                    
                   
                     <select style="border:none;padding:10px;" class="font-weight-bold text-primary" name="planSelect" id="planSelect">
                       <option value="0"> Planos de Assinatura</option> 
                       <?php if(!empty($plans)): foreach($plans as $plan):?>
                        
                     <option class="font-weight-bold text-primary" value="<?=$plan->id?>"><?=$plan->name?></option> 
                     <?php  endforeach; endif;?>
                    </select>
                
                   
                
                  </div>
                </div>
                            <div class="card-body">
                            <div class="ajax_response"><?=flash(); ?></div>
                               
                              
                             <input type="hidden" name="action" value="create">
                                
                                <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Primeiro Nome</label>
                                                        <input name="first_name" type="text" class="form-control cc-exp" >
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Sobrenome</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control cc-cvc" name="last_name" autocomplete="off">

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Genero</label>
                                                    <div class="input-group">
                                        
                                                        <select name="gender"  class="form-control cc-cvc" style="width:100%;">
                                        <option value="Masculino">Masculino </option>
                                        <option value="Feminino">Feminino</option>
                                            </select>

                                                    </div>
                                                </div>
                                           
                                    </div>
                           
                                   
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Nº Telefone</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  name="tel"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Observação (Opcional)</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="observation"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Modalidade</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <select name="modality"class="form-control p-0 border-0" style="width:100%;">
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
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Tipo de Pagamento</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <select name="type_payment"class="form-control p-0 border-0" style="width:100%;">
                                        <option value="Cash">Em Cash</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="TPA">TPA</option>
                                            </select>
                                        </div>
                                    </div>
                                  
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-save"></i> Salvar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </button>
                                    </div>
                                
                            </div>
                        </div>
                    </div></form>



<?php $v->start("js"); ?>            
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