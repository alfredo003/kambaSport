<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Costumer
 * @package Source\Models
 */
class Costumer extends Model
{
    /**
     * Costumer constructor.
     */
    public function __construct()
    {
        parent::__construct("costumers", ["id"], ["people", "IDcode"]);
    }

/**
     * @return null|People
     */
    public function people(): ?People
    {
        if ($this->people) {
            return (new People())->findById($this->people);
        }
        return null;
    }

    /**
     * @return null|Contact
     */
    public function Contact(): ?Contact
    {
        if ($this->contact) {
            return (new Contact())->findById($this->contact);
        }
        return null;
    }
    
    /**
     * @return null|Subscription
     */
    public function subscription(): ?Subscription
    {
        if ($this->IDcode) {
            return (new Subscription())->find("costumer_id = :id","id={$this->IDcode}")->fetch();
        }
        return null;
    }
  
}