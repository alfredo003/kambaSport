<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?=$head?>
 
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" href="<?=theme('assets/img/icon.svg')?>" sizes="32x32">
  <!-- Custom styles for this template-->
  <link href="<?=theme('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
  <link rel="stylesheet" href="<?=theme("assets/style.css")?>">
  <link rel="stylesheet" href="<?=theme("assets/css/styles/styles.css")?>">
  
  
</head>

<body class="bg-gradient-primary">
  <div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <div class="ajax_load_box_title">Aguarde, carregando!</div>
    </div>
</div>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row"> <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background:url('<?=theme('assets/img/back.jpg')?>');background-position:center;background-size:cover">

              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><img src="<?=theme('assets/img/logo.png')?>" style="width:300px;" alt="logo kambasport" ></h1>
                    
                  </div>
                  <hr>
                  
                  <form class="user" action="<?=url("/entrar"); ?>" method="post" enctype="multipart/form-data">
                  <?= csrf_input(); ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="<?= ($cookie ?? null); ?>" name="cod_access"  placeholder="Codigo de Acesso">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Palavra-passe">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                          
                      <label class="check">
                        <input type="checkbox" <?= (!empty($cookie) ? "checked" : ""); ?> name="save"/>
                        <span> Lembra-me</span>
                      </label>
                
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                      Entrar
                    </button>
                    
                  
                  </form>
                  <hr>
                 <div class="ajax_response"><?=flash(); ?></div>
                  <div class="text-center">
                    <a class="small" href="#">Esqueceste a senha?</a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

<script src="<?=theme('assets/scripts.js')?>"></script>

</body>

</html>
