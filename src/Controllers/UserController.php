<?php


namespace Oquiz\Controllers;


use Oquiz\Models\UserModel;
use Oquiz\Utils\User;
use Oquiz\Models\QuizModel;

class UserController extends CoreController {


    public function signin() {

        echo $this->templates->render('main/signin');
    }

    public function signinpost() {

      $errorList = array();

      $email = isset($_POST['email']) ? trim($_POST['email']) : '';
      $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (empty($email)) {
            $errorList[] = 'L\'adresse email doit être renseignée';
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errorList[] = 'L\'adresse email n\'est pas correcte';
        }
        if (empty($password)) {
            $errorList[] = 'Le mot de passe doit être renseigné';
        }
        if (count($errorList) == 0) {

            $userModel = UserModel::findByEmail($email);

            if ($userModel !== false) {

                if (password_verify($password, $userModel->getPassword())) {

                    User::setUser($userModel);

                    $this->sendJSON([
                        'code' => 1,
                        'url' => $this->router->generate('main_home')
                    ]);
                }
                else {
                    $errorList[] = 'Le mot de passe est incorrect pour cet email';
                }
            }
            else {
                $errorList[] = 'Aucun compte n\'a été trouvé pour cet email';
            }
        }

        $this->sendJSON([
            'code' => 2,
            'errorList' => $errorList
        ]);
    }

    public function signup() {

      $errorList = array();

      if (!empty($_POST)) {

          $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
          $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
          $email = isset($_POST['email']) ? trim($_POST['email']) : '';
          $password = isset($_POST['password']) ? trim($_POST['password']) : '';
          $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';

          //$first_name = htmlentities($first_name);

          if (empty($first_name)) {
              $errorList[] = 'Le prénom doit être renseigné';
          }
          if (empty($last_name)) {
              $errorList[] = 'Le nom doit être renseigné';
          }
          if (empty($email)) {
              $errorList[] = 'L\'adresse email doit être renseignée';
          }
          if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
              $errorList[] = 'L\'adresse email n\'est pas correcte';
          }
          if (empty($password)) {
              $errorList[] = 'Le mot de passe doit être renseigné';
          }
          if ($password != $confirmPassword) {
              $errorList[] = 'Les 2 mots de passe doivent être identiques';
          }
          if (strlen($password) < 8) {
              $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
          }

          if (count($errorList) == 0) {

              $hash = password_hash($password, PASSWORD_DEFAULT);

              $userModel = new UserModel();

              $userModel->setFirstName($first_name);
              $userModel->setLastName($last_name);
              $userModel->setEmail($email);
              $userModel->setPassword($hash);

              $insertedRows = $userModel->insert();

              if ($insertedRows > 0) {
                  echo $this->templates->render('main/home');
              }
              else {
                  $errorList[] = 'Erreur dans l\'ajout à la DB';
              }
          }
      }
      echo $this->templates->render('main/signup', [
          'errorList' => $errorList
      ]);
    }


    public function compte() {
        if (User::isConnected()) {

            $connectedUser = User::getUser();

            $userModel = UserModel::find($connectedUser->getId());

            $quizzes = QuizModel::findQuizzesByUserId($connectedUser->getId());

            echo $this->templates->render('main/compte', [
                'quizzes' => $quizzes,
                'userModel' => $userModel
            ]);
        }
        else {
            $this->redirectToRoute('main_signin');
        }
    }

    public function logout() {

        if (User::isConnected()) {

            User::logout();
            $this->redirectToRoute('main_home');
        }
        else {
            $this->redirectToRoute('main_signin');
        }
    }



}
