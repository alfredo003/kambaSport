<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Contact
 * @package Source\Models
 */
class Functions extends Model
{
    /**
     * Functions constructor.
     */
    public function __construct()
    {
        parent::__construct("functions", ["id"], ["name", "access_level"]);
    }


  
}