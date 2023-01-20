<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Modality
 * @package Source\Models
 */
class Modality extends Model
{
    /**
     * Modality constructor.
     */
    public function __construct()
    {
        parent::__construct("modalitys", ["id"], ["name", "status"]);
    }

   /**
     * @return null|Employee
     */
    public function employee(): ?Employee
    {
        if ($this->trainer) {
            return (new Employee())->findById($this->trainer);
        }
        return null;
    }
}