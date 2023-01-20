<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Plan
 * @package Source\Models
 */
class Plan extends Model
{
    /**
     * Plan constructor.
     */
    public function __construct()
    {
        parent::__construct("plans", ["id"], ["name", "period", "period_str"]);
    }

}