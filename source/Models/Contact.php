<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Contact
 * @package Source\Models
 */
class Contact extends Model
{
    /**
     * Contact constructor.
     */
    public function __construct()
    {
        parent::__construct("contacts", ["id"], ["tel"]);
    }


  
}