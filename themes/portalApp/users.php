<?php $v->layout("_theme"); ?>
<div class="container">
            <div class="row">
<div class="col-lg-6 col-xlg-6 col-md-6">
                        <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Utilizadores</h6>
                  <div class="dropdown no-arrow">
                    
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    
                  </div>
                </div>
                            <div class="card-body">
                               
                               
                                <form class="form-horizontal" method="post" action="<?=url('users/create')?>" enctype="multipart/form-data">
                                <?= csrf_input(); ?>
                                <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Primeiro Nome</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="........" name="first_name" class="form-control p-0 border-0"> 
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Ultimo Nome</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="........" name="last_name"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Função</label>

                                        <div class="col-sm-12 border-bottom p-0">
                                            <select class="form-select shadow-none p-0 border-0" name="functions" style="width:100%;">
                                               
                                            <?php if(!empty($functions)):foreach($functions as $function):?>
                                            <option value="<?=$function->id?>"><?=$function->name?></option>
                                            <?php endforeach; endif;?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Codigo Acesso</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="<?=$sport->codAccess?>" disabled
                                                class="form-control p-0 border-0">
                                                <input type="hidden" value="<?=$sport->codAccess?>" name="codAccess">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Palavra-passe</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="" name="password"
                                                class="form-control p-0 border-0">
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
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="data-table-list">
                
                        <div class="table-responsive">   
                        <div class="ajax_response"><?=flash(); ?></div>
                            <table id="data-table-basic" class="table table-hover" style="font-family:calibri;">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Função</th>
                                        <th>Codigo</th>
                                        <th>Senha</th>
                                        <th>Estado</th>
                                        <th>Config</th>
                                    </tr>
                                </thead>
                                <tbody class="users">
                                
                                    <?php if(!empty($list_users)): foreach($list_users as $list_user):
                                    
                                    
                                    $v->insert("components/user",["list_user"=> $list_user]);
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