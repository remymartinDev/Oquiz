<?php $this->layout('layout') ?>
<h2>Bienvenue sur O'Quiz</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<div class="flexbox">
    <?php foreach ($quizzList as $currentQuizz) : ?>
    <div class="box">
      <a href="<?= $router->generate('main_quiz', ['id' => $currentQuizz->getId()]) ?>">

        <h3><?= $currentQuizz->getTitle() ?></h3>
      </a>
        <p class="quizDescription"><?= $currentQuizz->getDescription() ?></p>
        <p class="quizAuteur">by &nbsp;<?= $currentQuizz->getAuthorNameById($currentQuizz->getAuthorId())[0].' '. $currentQuizz->getAuthorNameById($currentQuizz->getAuthorId())[1]?></p>
    </div>
    <?php endforeach; ?>
</div>
