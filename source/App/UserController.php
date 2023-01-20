<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Sport;
use Source\Models\Functions;
use Source\Models\Auth;
use Source\Support\Message;
use Source\Models\User;


/**
 * Web Controller
 * @package Source\App
 */
class UserController extends Controller
{
        /** @var User */
        private $user;
 
    /**
     * Web constructor.
     */
    public function __construct()
    {
        if (!$this->user = Auth::user()) {
            redirect("/entrar");
        }
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");

                                                                                                                                                                                                                             
    }

    public function profile(?array $data): void
    {
        if(!empty($data['action']) && $data['action']=='Edit'){
         
            $user = (new User())->findById($this->user->id);

            if(is_passwd($data["passwordActual"]) == $user->password){

            if (!empty($data["password"])) {
                if (empty($data["password_re"]) || $data["password"] != $data["password_re"]) {
                    $json["message"] = $this->message->warning("Para alterar sua senha, informa e repita a nova senha!")->render();
                    echo json_encode($json);
                    return;
                } 

                $user->password = $data["password"]; 
                
                if (!$user->save()) {
                $json["message"] = $user->message()->render();
                echo json_encode($json);
                return;
                  }
            }else{
                $json["message"] = $this->message->warning("Para alterar sua senha, informa e repita a nova senha!")->render();
                echo json_encode($json);
                return;
            } 

            }else{

                    $json["message"] = $this->message->warning("Para alterar sua senha, informa a senha actual")->render();
                    echo json_encode($json);
                    return;
            }
           

           
            $this->message->success("Pronto {$this->user->first_name}. Seus dados foram atualizados com sucesso!")->flash();
            $json['redirect']= url('/app/profile');
            echo json_encode($json);
            return;


        }
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Meu Perfil" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("profile", [
            "head" => $head,  
            "footer"=>true
        ]);
    }
   

    public function index(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Utilizadores" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("users", [
            "head" => $head,
            "functions"=>(new Functions())->find()->fetch(true),

            "list_users"=>(new User())->find()->fetch(true),
            "sport"=> (new Sport())->find()->fetch()
        ]);
    }

    public function create(?array $data): void
    {
          
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->message("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Informe os dados para criar a conta.")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            $user = new User();
            $user->bootstrap(
            $data["first_name"],
            $data["last_name"],
            $data["codAccess"],
            $data["functions"],
            "Desativo",
            $data["password"]
            );

            if ($auth->register($user)) {
                $this->message->success("Conta  {$user->first_name} criada com sucesso!")->flash();
                $json['redirect']= url('/users/index');
                echo json_encode($json);
                return;
            } else {
                $json['message'] = $auth->message()->before("Ooops! ")->render();
            }

            echo json_encode($json);
            return;
        }

     }

    public function delete(array $data): void
    {
      
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $Delete = (new User())->findById($data["id_user"]);
            $Delete->destroy();
            $this->message->info("O Utilizador foi excluído com sucesso...")->flash();
            $json['redirect']= url('users/index');
            echo json_encode($json);
            return;
       
        
    }
   


   
}