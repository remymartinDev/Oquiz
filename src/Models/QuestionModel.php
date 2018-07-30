<?php

namespace Oquiz\Models;

use Oquiz\Database;
use PDO;

class QuestionModel extends CoreModel {

    private $question;
    private $prop1;
    private $prop2;
    private $prop3;
    private $prop4;
    private $anecdote;
    private $wiki;
    private $id_quiz;
    private $id_level;
    private $results;

    const TABLE_NAME = 'questions';

    public static function getLevelNameById($levelId) {
        $sql = "
            SELECT *
            FROM levels
            LEFT JOIN ".self::TABLE_NAME."
            ON levels.id = ".self::TABLE_NAME.".id_level
            WHERE ".self::TABLE_NAME.".id_level = :levelId
            ";

        $pdoStatement = Database::getPDO()->prepare($sql);

          $pdoStatement->bindValue(':levelId', $levelId, PDO::PARAM_INT);

          $pdoStatement->execute();

          $results = $pdoStatement->fetch();

          return $results;
    }

    public static function getQuestionsByQuizzId($quizId) {
        $sql = "
            SELECT *, ".self::TABLE_NAME.".id
            FROM ".self::TABLE_NAME."
            LEFT JOIN quizzes
            ON ".self::TABLE_NAME.".id_quiz = quizzes.id
            WHERE quizzes.id = :quizId
            ";

        $pdoStatement = Database::getPDO()->prepare($sql);

        $pdoStatement->bindValue(':quizId', $quizId, PDO::PARAM_INT);

        $pdoStatement->execute();

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;
    }


    public function getQuestionId() {
        return $this->id;
    }
    public function getQuestion() {
        return $this->question;
    }
    public function getAnecdote() {
        return $this->anecdote;
    }
    public function getWiki() {
        return $this->wiki;
    }
    public function getQuizId() {
        return $this->id_quiz;
    }
    public function getLevelId() {
        return $this->id_level;
    }

    public function getProps($quizIndex) {
      $sql = "
          SELECT prop1, prop2, prop3, prop4
          FROM ".self::TABLE_NAME."
          ";

      $pdoStatement = Database::getPDO()->prepare($sql);

      $pdoStatement->execute();

      $results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

      return $results;
    }

    public function getProp1() {
        return $this->prop1;
    }
    public function getProp2() {
        return $this->prop2;
    }
    public function getProp3() {
        return $this->prop3;
    }
    public function getProp4() {
        return $this->prop4;
    }

}
