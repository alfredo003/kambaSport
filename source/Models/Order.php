<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Order
 * @package Source\Models
 */
class Order extends Model
{
    /**
     * Order constructor.
     */
    public function __construct()
    {
        parent::__construct("app_orders", ["id"], ["costumer_id", "subscription_id", "status"]);
    }


    public function byOrder(Costumer $costumer,Subscription $sub,Plan $plan,String $typepayment){

        $this->costumer_id = $costumer->IDcode;
        $this->subscription_id = $sub->id;
        $this->typepayment = $typepayment;
        $this->amount = $plan->price;
        $this->status = "active";
        $this->save();
        return $this; 
    }

} 