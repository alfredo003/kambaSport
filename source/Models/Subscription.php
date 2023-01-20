<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Subscription
 * @package Source\Models
 */
class Subscription extends Model
{
    /**
     * Subscription constructor.
     */
    public function __construct()
    {
        parent::__construct("subscriptions", ["id"], ["costumer_id","plan_id","started"]);
    }


    public function subscribe(String $costumer,Plan $plan,String $modality): Subscription{

        $this->costumer_id = $costumer;
        $this->plan_id = $plan->id;
        $this->status = "active";
        $this->modality = $modality;
        $this->started = date("Y-m-d");
 
        $day = (new \DateTime($this->started))->format("d");

        if ($day <= 28) {
            $this->due_day = $day;
            $this->next_due = date("Y-m-d", strtotime("+{$plan->period}"));
        } else {
            $due_day = 5;
            $next_due = date("Y-m-{$due_day}", strtotime("+{$plan->period}"));

            $this->due_day = $due_day;
            $this->next_due = date("Y-m-d", strtotime($next_due . "+1month"));
        }

        $this->last_charge = date("Y-m-d");
        $this->save();
        return $this;
    }

    public function plan(): ?Plan
    {
        if ($this->plan_id) {
            return (new Plan())->findById($this->plan_id);
        }
        return null;
    }

    
    public function modality(): ?Modality
    {
        if ($this->modality) {
            return (new Modality())->findById($this->modality);
        }
        return null;
    } 



  
}