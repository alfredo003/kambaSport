<?php $v->layout("_theme"); ?>

<div class="col-lg-12 col-xlg-12 col-md-12">
<?=flash()?>
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img  src="<?=theme('assets/img/user.jpg')?>" class="img-circle" width="150">
                                   <br> <br>
                                <h4 class="card-title m-t-10"><?= user()->first_name; ?> <?= user()->last_name; ?></h4>
                                    <h6 class="card-subtitle"><?= user()->functions()->name; ?></h6>
                                    <hr>
                                    <div class="row text-center justify-content-md-center">
                                   Codigo Acesso: <?= user()->codAccess; ?> 
                                    </div>
                                    <hr>
                                    <div class="row text-center justify-content-md-center">
                                   Palavra-passe: ***************  <small><a href="*" data-toggle="modal" data-target="#editPassword"> Alterar senha <i class="fa fa-edit"></i></a> </small>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>

                    <!-- Logout Modal-->
<div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Alterar a passe <i class="fa fa-lock"></i></h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <?=flash()?>
  <form action="<?=url('app/profile')?>" method="post">
  <input type="hidden" name="action" value="Edit">
  <div class="modal-body">
  <div class="form-group mb-4">

                                        <label for="example-email" class="col-md-12 p-0">Palavra-passe Actual</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" value="" name="passwordActual" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Nova Palavra-passe</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="password" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Confirmar passe</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="password_re"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
    <button class="btn btn-primary">Alterar</button>
  </div>
</div></form>
</div>
</div>