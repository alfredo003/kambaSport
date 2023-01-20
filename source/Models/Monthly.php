<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Monthly
 * @package Source\Models
 */
class Monthly extends Model
{
    /**
     * Monthly constructor.
     */
    public function __construct()
    {
        parent::__construct("monthlys", ["id"], ["value", "typePayment"]);
    }

}