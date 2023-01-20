<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Sport;
use Source\Models\Functions;
use Source\Models\Auth;
use Source\Support\Message;
use Source\Models\User;
use Source\Models\Modality;
use Source\Models\Employee;
use Source\Models\People;
use Source\Models\Contact;
use Source\Models\Costumer;
use Source\Models\Plan;
/**
 * Web Controller
 * @package Source\App
 */
class ConfigController extends Controller
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


    public function index(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Configuração" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("configuration/index", [
            "head" => $head,
            "active" =>"config",
            "functions"=>(new Functions())->find()->fetch(true),
            "list_users"=>(new User())->find()->fetch(true),
            "n_employee"=>(new Employee())->find()->Count(),
            "n_costumer"=>(new Costumer())->find()->Count(),
            "sport"=> (new Sport())->find()->fetch()
        ]);
    }

    public function modality(?array $data): void
    {

        if (!empty($data['action']) && $data['action']=="create") {

            if (empty($data['name']) || empty($data['description'])) {
                $json['message'] = $this->message->info("Informe os dados para criar modalidade.")->render();
                echo json_encode($json);
                return;
            } 

            $modality = new Modality();
            $modality->name = $data['name'];
            $modality->description = $data['description'];
            $modality->trainer = $data['trainer'];
            $modality->status ='Activo';
            $modality->save();
                $this->message->success("Modalidade {$modality->name} criada com sucesso ")->flash();
                $json['redirect']= url('/config/modalidade');
                echo json_encode($json);
                return;

        }


        if(!empty($data['action']) && $data['action']=="delete"){

            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $modality = (new Modality())->findById($data["id"]);
            $modality->destroy();
            $this->message->success("A Modalidade  {$modality->name} foi excluída com sucesso...")->flash();
            $json['redirect']= url('/config/modalidade');
            echo json_encode($json);
            return;
       

        }

        $trainer = "Trainer";
  
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Modalidade" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("configuration/modality", [
            "head" => $head,
            "active" =>"config",
            "list_modality"=>(new Modality())->find()->order("created_at DESC")->fetch(true),
            "list_trainer"=>(new Employee())->find("function_e = :fu","fu={$trainer}")->order("id ASC")->fetch(true),
            "sport"=> (new Sport())->find()->fetch()
        ]);
    }

    public function plans(?array $data): void
    {
        
        if (!empty($data['action']) && $data['action']=="create") {

            if (empty($data['name']) || empty($data['price']) || empty($data['period'])) {
                $json['message'] = $this->message->info("Informe os dados para registrar.")->render();
                echo json_encode($json);
                return;
            }

            $plan = new Plan();
            $plan->name = $data['name'];
            $plan->price = $data['price'];
            $plan->period = $data['period'];
            $plan->period_str = $data['period'];
            $plan->status = $data['status'];
            $plan->save();  

                        $this->message->success("Plano criado com sucesso ")->flash();
                        $json['redirect']= url('/config/planos');
                        echo json_encode($json);
                        return;
        

        }

           
        if (!empty($data['action']) && $data['action']=="update") {

            if (empty($data['name']) || empty($data['price']) || empty($data['period'])) {
                $json['message'] = $this->message->info("Informe os dados para Actualizar.")->render();
                echo json_encode($json);
                return;
            }

            $plan = (new Plan())->findById($data['id']);
            $plan->name = $data['name'];
            $plan->price = $data['price'];
            $plan->period = $data['period'];
            $plan->period_str = $data['period'];
            $plan->status = $data['status'];
            $plan->save();  

                        $this->message->success("Plano actualizado com sucesso ")->flash();
                        $json['redirect']= url('/config/planos');
                        echo json_encode($json);
                        return;
        

        }

        if(!empty($data['action']) && $data['action']=="delete"){

            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $plan = (new Plan())->findById($data["id"]);
            $plan->status = "canceled";
            $plan->save();
            $this->message->error("Plano {$plan->name} foi  excluído.")->flash();
            $json['redirect']= url('/config/planos');
            echo json_encode($json);
            return;
       

        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Configuração" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("configuration/plans", [
            "head" => $head,
            "active" =>"config",
            "functions"=>(new Functions())->find()->fetch(true),
            "list_plan"=>(new Plan())->find("status !=:s","s=canceled")->fetch(true),
            "sport"=> (new Sport())->find()->fetch()
        ]);
    }

    public function teste(array $data): void
    {

        $id=$_POST['id'];
        if($id == 0){
            echo "00,00";
        }else{
             $n = (new Plan())->find("id =:id","id={$id}")->fetch();
        echo $n->price;
        }
       

        }


    public function employee(?array $data): void
    {

        if (!empty($data['action']) && $data['action']=="create") {

            if (empty($data['first_name']) || empty($data['last_name']) || empty($data['n_bi'])) {
                $json['message'] = $this->message->info("Informe os dados para registrar.")->render();
                echo json_encode($json);
                return;
            }

                    $people = new People();
                    $people->first_name = $data['first_name'];
                    $people->last_name = $data['last_name'];
                    $people->gender = $data['gender'];
                    $people->save();  
                    $contact = new Contact();
                    $contact->tel = $data['tel'];
                    $contact->save();

                    $employee = new Employee();
                    $employee->people = $people->id;
                    $employee->contact = $contact->id;
                    $employee->function_e = $data['function'];
                    $employee->bi = $data['n_bi'];
                    $employee->status = "Activo";
                    $employee->save();

                        $this->message->success("Funcionário {$employee->people()->first_name} cadastrado com sucesso ")->flash();
                        $json['redirect']= url('/config/employee');
                        echo json_encode($json);
                        return;
        

        }


        if(!empty($data['action']) && $data['action']=="delete"){

            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $employee = (new Employee())->findById($data["id"]);
            $employee->destroy();
            $this->message->success("Funcionário  {$Employee->people()->first_name} foi excluída com sucesso...")->flash();
            $json['redirect']= url('/config/modalidade');
            echo json_encode($json);
            return;
       

        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " - Funcionários" ,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );

        echo $this->view->render("configuration/employee", [
            "head" => $head,
            "active" =>"config",
            "list_employee"=>(new Employee())->find()->fetch(true),
            "sport"=> (new Sport())->find()->fetch()
        ]);
    }

  
   


   
}