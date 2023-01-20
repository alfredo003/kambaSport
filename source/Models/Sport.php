<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class People
 * @package Source\Models
 */
class Sport extends Model
{
    /**
     * People constructor.
     */
    public function __construct()
    {
        parent::__construct("sport", ["id"], ["name", "nif"]);
    }


  
}