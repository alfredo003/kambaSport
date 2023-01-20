<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\User;



class LoginController extends Controller
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
                                       
    }

 
    public function index(): void
    {
        if(Auth::User()){
            redirect("/app");
            } 
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("login",["head" => $head]);
    } 


    /**
     * SITE LOGIN
     * @param null|array $data
     */
    public function login(array $data): void
    {
        if (!empty($data['csrf'])) {
            
            if (csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }


            if (empty($data['cod_access']) || empty($data['password'])) {
                $json['message'] = $this->message->warning("Informe seu codigo e senha para entrar")->render();
                echo json_encode($json);
                return;
            }

            $save = (!empty($data['save']) ? true : false);
            $auth = new Auth();
            $login = $auth->login($data['cod_access'], $data['password'], $save);

            if ($login) {
                
                $json['redirect'] = url("/app");

            } else {
                $json['message'] = $auth->message()->render();
            }

            echo json_encode($json);
            return;
        }

    }


    
    

  
}