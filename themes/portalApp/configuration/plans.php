<?php $v->layout("_theme"); ?>
<div class="container">
            <div class="row">
<div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Planos de Assinatura</h6>
                  <div class="dropdown no-arrow">
                    
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                     
                  </div>
                </div>
                            <div class="card-body">
                           
                                
                     <?=flash()?>
                                <form class="form-horizontal" method="post" action="<?=url('config/planos')?>" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="create">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Plano</label>
                                                        <input name="name" type="text" class="form-control cc-exp" >
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="x_card_code" class="control-label mb-1">Preço (kwanza)</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control cc-cvc" name="price" >
                                                      
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label for="x_card_code" class="control-label mb-1">Periodo</label>
                                                    <div class="input-group">
                                                        <select type="text" class="form-control cc-cvc" name="period" >
                                                        <option value="1month">Mensal</option> 
                                                        <option value="1day">Diário</option> 
                                                       <option value="1year">Anual</option> 
                                                       <option disabled >-----------</option> 
                                                       <option value="2month">2 Meses</option> 
                                                    </select>


                                                    </div>
                                                </div>
                                              
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Estado</label>
                                                        <select type="text" class="form-control cc-cvc" name="status" >
                                                        <option value="Active">Activo</option> 
                                                        <option value="inactive">Inativo</option> 
                                                     
                                                    </select>
                                                    </div>
                                                </div>
                    <div >
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus-square"></i> criar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </button>
                                    </div>
                                                </div>
                                            </div>
                                           
                                        </form>
                                
                         
                        </div>
                    </div>

                  
                    <div class="container-fluid">

            <div class="row">

                <?php if(!empty($list_plan)): foreach($list_plan as $plan):?>
                    
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-7 mb-5">
                <div class="card text-white h-100 py-2" style="border:2px solid #4e73df;">
                
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2"style="color:#4e73df;">
                        <div class=" font-weight-bold  text-uppercase mb-1" style="color:#4e73df;"><?=$plan->name?></div>
                        <div class="text-xs mb-0 font-weight-bold " >Preço: <?=$plan->price?> kz| Periodo:  <?=$plan->period_str?>  | Estado: 
                      
                        
                        <?php if($plan->status !="Active"):?> 
                            <span class="badge bg-danger rounded" style="color:#fff;"><?=$plan->status?> <i class="fa fa-calendar-times"></i></span>
                      
                        <?php else:?>
                            <span class="badge bg-success rounded" style="color:#fff;"><?=$plan->status?> <i class="fa fa-check-circle"></i></span>
                        <?php endif;?>
                    
                    </div>
                        -------------
                        <div class="text-xs mb-0 font-weight-bold " style="color:#4e73df;">Data Cadastro :  <?=$plan->created_at?></div>
                        </div>
                        
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deleteModality<?=$plan->id?>">
                                                            <i class="fa fa-edit"></i> Editar
                                                        </button>

                            
                    </div>
                    </div>
                </div>
                </div>

                
                <!-- Logout Modal-->
                <div class="modal fade" id="deleteModality<?=$plan->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <?=$plan->name?> <i class="fa fa-list"></i></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <?=flash()?>
                <form action="<?=url('config/planos')?>" method="post">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?=$plan->id?>">
                <div class="modal-body">
                <div class="form-group mb-4">
                <div class="col-12">
                       <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Plano</label>
                         <input name="name" type="text" class="form-control cc-exp" value="<?=$plan->name?>">
                         </div>
                </div>
                <div class="col-12">
                       <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1">Preço(kwanza)</label>
                         <input name="price" type="number" class="form-control cc-exp" value="<?=$plan->price?>">
                         </div>
                </div>
                           
                <div class="col-12">
                                                    <label for="x_card_code" class="control-label mb-1">Periodo</label>
                                                    <div class="input-group">
                                                        <select type="text" class="form-control cc-cvc" name="period" >
                                                        <option value="<?=$plan->period_str?>"><?=$plan->period_str?></option>
                                                        <option value="1month">Mensal</option> 
                                                        <option value="1day">Diário</option> 
                                                       <option value="1year">Anual</option> 
                                                       <option disabled >-----------</option> 
                                                       <option value="2month">2 Meses</option> 
                                                    </select>


                                                    </div>
                                                </div>
                           
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Estado</label>
                                                        <select type="text" class="form-control cc-cvc" name="status" >
                                                        <option value="Active">Activo</option> 
                                                        <option value="inactive">Inativo</option> 
                                                     
                                                    </select>
                                                    </div>
                                                </div>      
                </div>
                <div class="modal-footer">
                <button class="btn btn-success" >Actualizar</button>
               
               
                
                </div>
                </div>
                </form> <form action="<?=url('config/planos')?>" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?=$plan->id?>">
                    <button class="btn text-danger" type="submit"><i class="fa fa-ban"></i> Eliminar o plano</button>
                </form>
                </div>
                </div>



</div>
                <?php endforeach; endif;?>

                </div>


                </div>
                </div>
        </div>