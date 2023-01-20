<?php $v->layout("_theme"); ?>
<div class="container">
            <div class="row">
<div class="col-lg-6 col-xlg-6 col-md-6">
                        <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-user-cog"></i> Funcionário</h6>
                  <div class="dropdown no-arrow">
                    
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    
                  </div>
                </div>
                            <div class="card-body">
                               
                            <div class="ajax_response"><?=flash(); ?></div>
                                <form class="form-horizontal" method="post" action="<?=url('config/employee')?>" enctype="multipart/form-data">
                                <div class="row">
                                <input name="action" type="hidden" value="create">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Primeiro Nome</label>
                                                        <input name="first_name" type="text" class="form-control cc-exp" autocomplete="off" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Sobrenome</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control cc-cvc" name="last_name" autocomplete="off">

                                                    </div>
                                                </div>
                                               
                                           
                                    </div>
                                    <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Genero</label>
                                                        <select name="gender"class="form-control p-0 " style="width:100%;">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                            </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Contacto</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control cc-cvc" name="tel"  placeholder="Nº Telefone" autocomplete="off">

                                                    </div>
                                                </div>
                                               
                                           
                                    </div>

                                    <div class="row">
                                    <div class="col-12">
                                                    <label for="x_card_code" class="control-label mb-1">Nº Bilhete de Identidade</label>
                                                    <div class="input-group">
                                                    <input name="n_bi"class="form-control p-0 " style="width:100%;"/>
                                      
                                            </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12"><br>
                                                    <label for="x_card_code" class="control-label mb-1">Função</label>
                                                    <div class="input-group">
                                                    <select name="function"class="form-control p-0 " style="width:100%;">
                                        <option value="Trainer">Treinar</option>
                                        <option value="Gerente">Gerente</option>
                                            </select>
                                                    </div>
                                                </div>
                                               
                                           
                                    </div>
                                    <br><br>
                            <div class="row">
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-save"></i> Salvar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </button>
                                    </div></div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="data-table-list">
                
                        <div class="table-responsive">   
                      <a href="" class="btn"><i class="fa fa-print"></i></a>
                            <table id="data-table-basic" class="table table-hover" style="font-family:calibri;">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Genero</th>
                                        <th>Contacto</th>
                                        <th>Função</th>
                                        <th>Estado</th>
                                        <th>Config</th>
                                    </tr>
                                </thead>
                                <tbody class="users">
                                
                                    <?php if(!empty($list_employee)): foreach($list_employee as $employee):
                                    
                                    
                                    $v->insert("components/employee",["employee"=> $employee]);
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