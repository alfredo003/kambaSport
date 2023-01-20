<?php $v->layout('_theme')?>


<div class="content-wrapper">
    <div class="container-fluid">
<div class="row mt-3">
       

        <div class="col-lg-12">
           <div class="card">
            <div class="card-body ">
            <ul class="bg-primary " >
                <li class="nav-item ">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active text-white"><i class="icon-print"></i> <span class="hidden-xs">   HISTORICO DO CLIENTE</span></a>
                </li>
              
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile">
                <table class="table table-striped" style="font-family:calibri;">
                                   
                                   <tr>
                                           <th>ID : <?=$costumer->IDcode?> </th>
                                          
                                           <th>Data de Cadastro : <?=date_fmt_br($costumer->created_at)?></th>
                                       </tr>
                                     
                                
                               </table>
                    <h3 class="mb-3"><?=$costumer->people()->first_name?> <?=$costumer->people()->last_name?></h3> <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Genero : <?=$costumer->people()->gender?> | Contacto : <?=$costumer->Contact()->tel?></h6> <hr>
 
                            <h6>Plano: <?=$subscription->plan()->name?> | Estado : <span class="badge badge-success"><i class="fa fa-check-circle"></i>  <?=$costumer->status?></h6>
                             <hr><h6>Modalidade :  <?=$subscription->modality()->name?> | Proximo Pagamento : <span class="badge badge-danger"><i class="fa fa-cog"></i> <?=date_fmt($subscription->next_due)?></span></h6>
                            <br>
                            <div class="alert alert-block alert-info" style="border-radius:0px;">
                              <button data-dismiss="alert" class="close" type="button">×</button>
                              <h4 class="alert-heading">Observação</h4>
                              <p>
                              <?=$costumer->observation?>
                              </p>
                          </div>
                           <br>
                        </div>
                        <div class="col-12 col-lg-12">
	   
       <ul class="bg-warning" >
                <li class="nav-item ">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active text-white"><i class="fa fa-th-list"></i> <span class="hidden-xs">   PAGAMENTOS EFECTUADOS</span></a>
                </li>
          </ul>
	
	       <div class="table-responsive">
                 <table class="table align-items-center table-striped" style="text-align:center;">
                  <thead>
                   <tr>
                     <th>Data</th>
                     <th>Valor (kwanza)</th>
                     <th>Tipo de Pagamento</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php if($orders): foreach($orders as $order):?>    
                   <tr>
                    <td><?=date_fmt($order->created_at)?></td>
                    <td><?=$order->amount?></td>
                    <td><?=$order->typepayment?></td>
				
                   </tr>
                   <?php endforeach;endif;?>
				   
				   
                 </tbody></table>
               </div>
	   </div>
	 </div>
                          </p>
                        </div>
                   
                    </div>
                    <!--/row-->
                </div>
            
            </div>
        </div>
      </div>
      </div>
      </div>