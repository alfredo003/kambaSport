<?php $v->layout("_theme"); ?>
<div class="container">
            <div class="row">
<div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Modalidades</h6>
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
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Nome</label>
                                                        <input name="name" type="text" class="form-control cc-exp" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Treinador</label>
                                                    <div class="input-group">
                                                        <select type="text" class="form-control cc-cvc" name="trainer" >
                                                        <option>-----</option> 
                                                            <?php if(!empty($list_trainer)): foreach($list_trainer as $trainer):?>
                                                       <option value="<?=$trainer->id?>"><?=$trainer->People()->first_name?> <?=$trainer->People()->last_name?></option> 
                                                       <?php endforeach; endif; ?>
                                                    </select>

                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Descrição(Opcional)</label>
                                                        <input id="cc-exp" name="description" type="text" class="form-control cc-exp" >
                                                    </div>
                                                </div>
                   
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus-square"></i> criar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </button>
                                    </div>
                                        </form>
                                
                         
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                
                        <div class="table-responsive">   
                        <div class="ajax_response"><?=flash(); ?></div>
                            <table id="data-table-basic" class="table table-hover" style="font-family:calibri;">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Treinador</th>
                                        <th>Estado</th>
                                        <th>Config</th>
                                    </tr>
                                </thead>
                                <tbody class="users">
                                
                                    <?php if(!empty($list_modality)): foreach($list_modality as $modality):
                                    
                                    
                                    $v->insert("components/modality",["modality"=> $modality]);
                                    ?>
                                  
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
        </div>