<?php $this->layout('layout') ?>

<div class="monCompte1">
    <h2>Mon Compte</h2>
        <div class="userLine">
            <span class="userGeneric">Nom</span>&nbsp;:&nbsp;<span class="userDynamic"><?=$connectedUser->getLastName() ?></span>
        </div>
        <div class="userLine">
            <span class="userGeneric">Prénom</span>&nbsp;:&nbsp;<span class="userDynamic"><?=$connectedUser->getFirstName() ?></span>
        </div>
        <div class="userLine">
            <span class="userGeneric">Email</span>&nbsp;:&nbsp;<span class="userDynamic"><?=$connectedUser->getEmail() ?></span>
        </div>
</div>

<div class="upTheFooter"></div>
    <div class="monCompte2">
        <h2>Mes Quizz</h2>
    </div>

        <div class="flexbox">
            <?php foreach ($quizzes as $currentQuizz) : ?>
            <div class="box1">
              <a href="<?= $router->generate('main_quiz', ['id' => $currentQuizz->getId()]) ?>">

                <h3><?= $currentQuizz->getTitle() ?></h3>
              </a>
                <p class="quizDescription"><?= $currentQuizz->getDescription() ?></p>
                <p class="quizAuteur">by &nbsp;<?= $currentQuizz->getAuthorNameById($currentQuizz->getAuthorId())[0].' '. $currentQuizz->getAuthorNameById($currentQuizz->getAuthorId())[1]?></p>
            </div>
            <?php endforeach; ?>
        </div>


<div class="upTheFooter"></div>
