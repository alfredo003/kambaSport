<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class BookPresence
 * @package Source\Models
 */
class BookPresence extends Model
{
    /**
     * BookPresence constructor.
     */
    public function __construct()
    {
        parent::__construct("book_points", ["id"], ["costumer"]);
    }


  
}