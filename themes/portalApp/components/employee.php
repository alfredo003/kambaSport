
<tr>
    <td><?=$employee->people()->first_name?> <?=$employee->people()->last_name?></td>
    <td><?=$employee->people()->gender?></td>
    <td><?=$employee->contact()->tel?></td>
    <td><?=$employee->function?></td>

    <td>
        <?php if($employee->status == 'Activo'):?> 
        <span class="badge bg-success rounded" style="color:#fff;"><?=$employee->status?> <i class="fa fa-check-circle"></i></span>
        <?php else:?>
            <span class="badge bg-danger rounded" style="color:#fff;"><?=$employee->status?> <i class="fa fa-calendar-times"></i></span>
            <?php endif;?>
    </td>
    <td>
        
        <a class="text-danger" data-toggle="modal" data-target="#deleteModality-<?=$employee->id?>" style="border:none;"><i class="fa fa-trash-alt"></i></a>
        <a class="text-primary" data-toggle="modal" data-target="#" style="border:none;"><i class="fa fa-edit"></i></a>

    </td>  
    

    

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