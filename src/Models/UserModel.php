<?php

namespace Oquiz\Models;

use Oquiz\Database;
use PDO;

class UserModel extends CoreModel {

    protected $first_name;

    protected $last_name;

    protected $email;

    protected $password;

    const TABLE_NAME = 'users';


    public function getQuizzes() {
        return QuizModel::findQuizzesByUserId($this->id);
    }

    public static function findByEmail($mail) {
        $sql = '
            SELECT *
            FROM '.self::TABLE_NAME.'
            WHERE email = :mail
            LIMIT 1
        ';
        $pdoStatement = Database::getPDO()->prepare($sql);

        $pdoStatement->bindValue(':mail', $mail, PDO::PARAM_STR);

        $pdoStatement->execute();

        // JE n'ai qu'un résultat => fetchObject
        $result = $pdoStatement->fetchObject(self::class);

        return $result;
    }


    public function insert() {
        $sql = "
            INSERT INTO ".self::TABLE_NAME."
            (`first_name`, `last_name`, `email`, `password`)
            VALUES
            (:first_name, :last_name, :email, :password)
        ";

        $pdoStatement = Database::getPDO()->prepare($sql);

        $pdoStatement->bindValue(':first_name', $this->first_name , PDO::PARAM_STR);
        $pdoStatement->bindValue(':last_name', $this->last_name , PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $this->email , PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password , PDO::PARAM_STR);


        $affectedRows = $pdoStatement->execute();

        $this->id = Database::getPDO()->lastInsertId();

        return $affectedRows;
    }

    public function getFirstName() {
        return $this->first_name;
    }
    public function getLastName() {
        return $this->last_name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setFirstName($first_name) {
        if (!empty($first_name)) {
            $this->first_name = $first_name;
        }
    }
    public function setLastName($last_name) {
        if (!empty($last_name)) {
            $this->last_name = $last_name;
        }
    }
    public function setEmail($email) {
        if (!empty($email)) {
            $this->email = $email;
        }
    }
    public function setPassword($password) {
        if (!empty($password)) {
            $this->password = $password;
        }
    }
}
