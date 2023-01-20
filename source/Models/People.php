<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class People
 * @package Source\Models
 */
class People extends Model
{
    /**
     * People constructor.
     */
    public function __construct()
    {
        parent::__construct("peoples", ["id"], ["first_name", "gender"]);
    }


  
}