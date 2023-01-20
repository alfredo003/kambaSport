<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Sport;
use Source\Models\Functions;
use Source\Models\Auth;
use Source\Support\Message;
use Source\Models\User;
use Source\Models\Modality;
use Source\Models\Costumer;
use Source\Models\People;
use Source\Models\Contact;
use Source\Models\Monthly;
use Source\Models\Subscription;
use Source\Models\Plan;
use Source\Models\BookPresence;
use Source\Models\Alert;
use Source\Models\Order;
/**
 * Web Controller
 * @package Source\App
 */
class AppController extends Controller
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

    /**
     * SITE HOME
     */
    public function home(): void
    {
       

        $head = $this->seo->render(
            CONF_SITE_NAME . " - ( Bem-Vindo {$this->user->first_name})" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("home", [
            "head" => $head,  
            "active" =>"home",
            "user" =>$this->user,
            "n_costumer"=>(new Costumer())->find()->count(),
            "alert_c"=>(new Alert())->find("status =:s","s=see")->count(),
            "alerts"=>(new Alert())->find("status =:s","s=see")->fetch(true),
        ]);
    }

    /**controle de clientes */

public function newCostumer(?array $data):void
{
    if(!empty($data["action"]) && $data["action"] == "create"){

        if (empty($data['first_name']) || empty($data['last_name']) || $data['planSelect'] == 0) {
            $json['message'] = $this->message->info("Informe todos os dados para cadastrar o cliente !")->render();
            echo json_encode($json);
            return;
        }
 
        $people = (new People());
        $people->first_name =$data['first_name'];
        $people->gender =$data['gender'];
        $people->last_name =$data['last_name'];

        if ($people->save()){

           $contact = (new Contact());
           if(!empty($data['tel'])){
               $tel =$data['tel'];
           }else{
               $tel =0;
           }
           $contact->tel =$tel;
        
           if ($contact->save()){

                $costumer = (new Costumer());
                $costumer->IDcode=$data['IDcode'];
                $costumer->people=$people->id;
                $costumer->contact=$contact->id;
                $costumer->observation=$data['observation'];
                $costumer->status="Activo";
        
                if ($costumer->save()) {
                  $plan = (new Plan())->findById($data['planSelect']);
                  $sub = (new Subscription())->subscribe($costumer->IDcode, $plan,$data['modality']);
                  $order = (new Order())->byOrder($costumer,$sub,$plan,$data['type_payment']);
                  
                    $json['redirect'] = url("/app/novo-cliente");
                    $this->message->success("cadastro do cliente - {$people->first_name} {$people->last_name}- feito com sucesso..!")->flash();
                    echo json_encode($json);
                    return;
                }
        
                  
            }

        }


        $json['message'] = $this->message->error("Erro ao cadastrar o cliente..!")->render();
        echo json_encode($json);
        return;
    }

 
     $IDcostumer=(new Costumer())->findmax()->fetch();
     $code = "".($IDcostumer->id+1).date('Y').$IDcostumer->id."";
   

    $head = $this->seo->render(
        CONF_SITE_NAME . " - Novo Cliente" ,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
    );

    echo $this->view->render("new_costumer", [
        "head" => $head,
        "user" => $this->user,
        "IDcostumer"=>$code,
        "list_modality"=>(new Modality())->find()->fetch(true),
        "plans"=>(new Plan())->find('status =:status','status=Active')->fetch(true),
        "active" =>"cliente"
    ]);
} 
  
public function listCostumer(?array $date):void
{
    $head = $this->seo->render(
        CONF_SITE_NAME . " - Lista de Cliente" ,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
    );

    echo $this->view->render("list_costumer", [
        "head" => $head,
        "user" => $this->user,
        "costumers"=>(new Costumer())->find()->order("created_at DESC")->fetch(true),
        "n_costumer"=>(new Costumer())->find()->count(),
        "n_costumer_block"=>(new Costumer())->find("status = :s","s=Bloqueado")->count(),
        "active" =>"cliente"
    ]);
}

public function searchCostumer(?array $date):void
{
    $head = $this->seo->render(
        CONF_SITE_NAME . " - Lista de Cliente" ,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
    );

    echo $this->view->render("search_costumer", [
        "head" => $head,
        "user" => $this->user,
        "costumers"=>(new Costumer())->find()->order("created_at DESC")->fetch(true), 
        "active" =>"cliente"
    ]);
}

public function historicalCostumer(?array $data):void
{
    $costumer=(new Costumer())->findByIDcode($data['IDcode']);
    $subscriptions=(new Subscription())->find("costumer_id = :code AND status != :s","code={$data['IDcode']}&s=canceled")->fetch();
    $orders=(new Order())->find("costumer_id = :code","code={$data['IDcode']}")->order("created_at DESC")->fetch(true);
   
    $head = $this->seo->render(
        CONF_SITE_NAME . " - Lista de Cliente" ,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
    );

    echo $this->view->render("historical_costumer", [
        "head" => $head,
        "user" => $this->user,
        "subscription"=>$subscriptions,
        "orders"=>$orders,
       
        "costumer"=>$costumer,
        "active" =>"cliente"
    ]);
}

public function monthly(?array $data):void
{

    if(!empty($data["action"]) && $data["action"] == "update"){
     
        $costumer =  (new Costumer())->find("IDcode =:id","id={$data['idcode']}");
        $sub = (new Subscription())->findById($data['id']);

       
        $sub->costumer_id = $data['idcode'];
        $sub->plan_id = $data['plan'];
        $sub->status = "active";
        $sub->modality = $data['modality'];
        $sub->started = date("Y-m-d");

        $plan = (new Plan())->findById($data['plan']);
        $day = (new \DateTime($plan->next_due))->format("d");

        if ($day <= 28) {
            $sub->due_day = $day;
            $sub->next_due = date("Y-m-d", strtotime("+{$plan->period}"));
        } else {
            $due_day = 5;
            $next_due = date("Y-m-{$due_day}", strtotime("+{$plan->period}"));

            $sub->due_day = $due_day;
            $sub->next_due = date("Y-m-d", strtotime($next_due . "+1month"));
        }

        $sub->last_charge = date("Y-m-d");  
    
        $order = (new Order())->byOrder($costumer,$sub,$plan,$data['type_payment']);
        $sub->save();
      

        $json['redirect'] = url("/app/mensalidade");
        $json['message'] = $this->message->success("Pagamento feito com sucesso! ")->render();
        echo json_encode($json);
        return;
        

    }
    
 
    $head = $this->seo->render(
        CONF_SITE_NAME . " - Mensalidade" ,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
    );

    echo $this->view->render("monthly", [
        "head" => $head,
        "user" => $this->user, 
         "costumers"=>(new Costumer())->find()->fetch(true),
          "list_modality"=>(new Modality())->find()->fetch(true),
         "plans"=>(new Plan())->find('status =:status','status=active')->fetch(true),
        "active" =>"cliente"
    ]);
}

public function listPoint(?array $data):void
{

    if(!empty($data['action']) && $data['action']=="confirmar"){
       
        $bookPresence = (new BookPresence());
        $bookPresence->costumer = $data['id'];
        $bookPresence->date = date('Y-m-d:H:mm:s');
        $bookPresence->presence = 'P';
        $bookPresence->id_user = $this->user->id;
        $bookPresence->save();
    
        $costumer = (new Costumer())->findById($data['id']);
        $costumer->check_in = "Dentro";
        $costumer->save();
        $json['redirect'] = url("app/lista-presenca");
        echo json_encode($json);
        return;
    }

    $head = $this->seo->render(
        CONF_SITE_NAME . " - Lista de Presença" ,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
    );

    echo $this->view->render("list_point", [
        "head" => $head,
        "user" => $this->user,
        "costumers"=>(new Costumer())->find("status =:c","c=Activo")->order("created_at DESC")->fetch(true), 
        "active" =>"presenca"
    ]);
}
public function listBook():void
{

    $head = $this->seo->render(
        CONF_SITE_NAME . " - Lista de Presença" ,
        CONF_SITE_DESC,
        url(),
        theme("/assets/images/share.jpg")
    );

    echo $this->view->render("list_book", [
        "head" => $head,
        "user" => $this->user,
        "costumers"=>(new Costumer())->find("status =:c","c=Activo")->order("created_at DESC")->fetch(true), 
        "active" =>"presenca"
    ]);
}

  /**
     * APP LOGOUT
     */
    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->username . ". Volte Sempre !")->flash();

        Auth::logout();

        $update = (new User())->findById($this->user->id);
        $update->status = "Desativo";
        $update->save();
        redirect("/entrar");
    }

    
    
    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "alerta";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "alerta";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Conteúdo indispinível";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido.";
                $error->linkTitle = "Continue navegando";
                $error->link = url_back();
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,

            url("/ops/{$error->code}"),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error,
            "footer"=>true
        ]);
    }
}