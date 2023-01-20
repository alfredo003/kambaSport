<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Alert
 * @package Source\Models
 */
class Alert extends Model
{
    /**
     * Alert constructor.
     */
    public function __construct()
    {
        parent::__construct("alerts", ["id"], ["text"]);
    }


  
}