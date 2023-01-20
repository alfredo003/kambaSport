<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class employee
 * @package Source\Models
 */
class Employee extends Model
{
    /**
     * employee constructor.
     */
    public function __construct()
    {
        parent::__construct("employees", ["id"], ["people", "contact"]);
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
}