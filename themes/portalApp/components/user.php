
<tr>
    <td><?="{$list_user->first_name} {$list_user->last_name}"?></td>
    <td></td>
    <td><?=$list_user->codAccess?></td>
    <td>*******</td>

    <td>
        <?php if($list_user->status == 'Activo'):?> 
        <span class="badge bg-success rounded" style="color:#fff;"><?=$list_user->status?> <i class="fa fa-check-circle"></i></span>
        <?php else:?>
            <span class="badge bg-danger rounded" style="color:#fff;"><?=$list_user->status?> <i class="fa fa-calendar-times"></i></span>
            <?php endif;?>
    </td>
    <td>
        
        <a class="text-danger" data-toggle="modal" data-target="#deleteuser-<?=$list_user->id?>" style="border:none;"><i class="fa fa-trash-alt"></i></a>

    </td>  
    

    

<!-- Logout Modal-->
<div class="modal fade" id="deleteuser-<?=$list_user->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel"> <?="{$list_user->first_name} {$list_user->last_name}"?> <i class="fa fa-user"></i></h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<?=flash()?>
<form action="<?=url('users/delete')?>" method="post">
<input type="hidden" name="id_user" value="<?=$list_user->id?>">
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