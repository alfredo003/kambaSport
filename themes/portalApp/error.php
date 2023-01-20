<?php $v->layout("_theme");?>

     <!-- 404 Error Text -->
     <div class="text-center">
            <div class="error mx-auto" data-text="404"><?= $error->code; ?></div>
            <p class="lead text-gray-800 mb-5"><?= $error->title; ?></p>
            <p class="text-gray-500 mb-0"><?= $error->message; ?></p>
            <a title="<?= $error->linkTitle; ?>" href="<?= $error->link; ?>">&larr; <?= $error->linkTitle; ?></a>
          </div>



        