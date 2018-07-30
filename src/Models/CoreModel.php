<?php

namespace Oquiz\Models;

use Oquiz\Database;
use PDO;

abstract class CoreModel {

  protected $id;

    public static function find($id) {

      $sql = '
          SELECT *
          FROM '.static::TABLE_NAME.'
          WHERE id = :id';

      $pdoStatement = Database::getPDO()->prepare($sql);

      $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

      $pdoStatement->execute();

      $result = $pdoStatement->fetchObject(static::class);

      return $result;
    }

    public static function findAll() {

        $sql = "
            SELECT *
            FROM ".static::TABLE_NAME."
        ";

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);

        return $results;
    }

    public function getId() {
        return $this->id;
    }


}
