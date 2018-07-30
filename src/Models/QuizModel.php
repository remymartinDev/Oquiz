<?php

namespace Oquiz\Models;

use Oquiz\Database;
use PDO;

class QuizModel extends CoreModel {

  private $title;
  private $description;
  private $id_author;

  const TABLE_NAME = 'quizzes';

    public static function getAuthorNameById($authorId) {
        $sql = "
            SELECT u.first_name, u.last_name
            FROM users u
            LEFT JOIN ".self::TABLE_NAME."
            ON u.id = ".self::TABLE_NAME.".id_author
            WHERE ".self::TABLE_NAME.".id_author = :authorId
            ";

        $pdoStatement = Database::getPDO()->prepare($sql);

          $pdoStatement->bindValue(':authorId', $authorId, PDO::PARAM_INT);

          $pdoStatement->execute();

          $results = $pdoStatement->fetch();

          return $results;
    }

      public static function findQuizzesByUserId($userId) {
        $sql = "
            SELECT ".self::TABLE_NAME.".*
            FROM ".self::TABLE_NAME."
            LEFT JOIN users
            ON ".self::TABLE_NAME.".id_author=users.id
            WHERE users.id = :userId
            ";
        // Je prépare ma requête
        $pdoStatement = Database::getPDO()->prepare($sql);

        // Je fais mes "binds"
        $pdoStatement->bindValue(':userId', $userId, PDO::PARAM_INT);

        // Exécution de la requête
        $pdoStatement->execute();

        // Je récupère les résultats sous forme de tableau d'objets
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;
    }

    public function getTitle() {
        return $this->title;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getAuthorId() {
        return $this->id_author;
    }


}
