<?php $v->layout("_theme"); ?>
<div class="container">
            <div class="row">
<div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Buscar Lista</h6>
                  <div class="dropdown no-arrow">
                    
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    
                  </div>
                </div>
                            <div class="card-body">
                           
                                
                     
                                <form class="form-horizontal" method="post" action="<?=url('config/modalidade-payment')?>" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="create">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Modalidade</label>
                                                        <select type="text" class="form-control cc-cvc" name="trainer" >
                                                        <option>-----</option> 
                                                            <?php if(!empty($list_trainer)): foreach($list_trainer as $trainer):?>
                                                       <option value="<?=$trainer->id?>"><?=$trainer->People()->first_name?> <?=$trainer->People()->last_name?></option> 
                                                       <?php endforeach; endif; ?>
                                                    </select>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Mes</label>
                                                    <div class="input-group">
                                                    <input name="name" type="text" class="form-control cc-exp" >

                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="x_card_code" class="control-label mb-1">Ano</label>
                                                    <div class="input-group">
                                                    <input name="name" type="text" class="form-control cc-exp" disabled value="<?=date('Y')?>">

                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search"></i> Pesquisar
                                        </button>
                                       
                                    </div>
                                        </form>
                                
                         
                        </div>
                    </div>

                    
                </div>
                </div>
        </div>