<?php

namespace Oquiz\Utils;

class User {

  public static function isConnected() {
    return !empty($_SESSION['user']);
  }

  public static function getUser() {
    if (self::isConnected()) {
        return $_SESSION['user'];
    }
    return false;
  }

  public static function setUser($userModel) {
      if (is_object($userModel)) {
          $_SESSION['user'] = $userModel;
      }
  }

  public static function logout() {

      unset($_SESSION['user']);

      session_unset();

      session_destroy();
  }


}
