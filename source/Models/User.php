<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 * @author Alfredo Manuel <alfredomanuel127.0@gmail.com>
 * @package Source\Models
 */
class User extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("users", ["id"], ["first_name", "codAccess", "status", "password"]);
    }
      /**
     * @param string $firstName
     * @param string $lastName
     * @param string $codAccess
     * @param string $password
     *  @param string $status
     * @return User
     */
    public function bootstrap(
        string $firstName,
        string $lastName,
        string $codAccess,
        string $function,
        string $status,
        string $password
    ): User {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->codAccess = $codAccess;
        $this->function = $function;
        $this->status = $status;
        $this->password = $password;
        return $this;
    }


     /**
     * @return null|Fnctions
     */
    public function functions(): ?Functions
    {
        if ($this->function) {
            return (new Functions())->findById($this->function);
        }
        return null;
    }
 

    /**
     * @param string $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        $find = $this->find("email = :email", "email={$email}", $columns);
        return $find->fetch();
    }
    /**
     * @param string $cod_access
     * @param string $columns
     * @return null|User
     */

    public function findByCod(string $cod_access, string $columns = "*"): ?User
    {
        $find = $this->find("codAccess = :codAccess", "codAccess={$cod_access}", $columns);
        return $find->fetch();
    }


    public function photo(): ?string
    {
        if ($this->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$this->photo}")) {
            return $this->photo;
        }

        return null;
    }


    
    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return false;
        } else {
            $this->password = passwd($this->password);
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("email = :e AND id != :i", "e={$this->email}&i={$userId}", "id")->fetch()) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** User Create */
        if (empty($this->id)) {
      

            $userId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($userId))->data();
        return true;
    }
}