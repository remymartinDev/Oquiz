<?php $this->layout('layout') ?>
<?php $score = 0 ?>
<div class="box">

    <h3><?= $quizz->getTitle()?></h3><span class="nbQuestions"><?=sizeof($questionsList) ?> questions</span>
    <p class="quizzDescription"><?= $quizz->getDescription() ?></p>
    <p class="quizzAuteur">by &nbsp;<?= $quizz->getAuthorNameById($quizz->getAuthorId())[0].' '. $quizz->getAuthorNameById($quizz->getAuthorId())[1]?></p>
</div>

<?php foreach ($questionsList as $currentQuestion) : ?>
    <?php if (isset($_POST[$currentQuestion->getId()]) !== false) : ?>
        <?php if ($_POST[$currentQuestion->getId()] == $currentQuestion->getProp1()) : ?>
        <?php $score++ ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endforeach; ?>

    <?php if (empty($_POST) !== true) : ?>
      <div class="dialog">
      <p>  Votre score <?= $score ?> / <?=sizeof($questionsList) ?></p>
      <a href="<?= $router->generate('main_quiz', ['id' => $quizz->getId()]) ?>">Rejouer</a>
      </div>
    <?php endif; ?>
    

<form class="" action="" method="post">
    <div class="flexbox">
    <?php foreach ($questionsList as $currentQuestion) : ?>
        <div class="questionBox" id="<?= $currentQuestion->getId() ?>">

            <div class="upPart
                <?php if (isset($_POST[$currentQuestion->getId()]) == true) : ?>
                    <?php if ($_POST[$currentQuestion->getId()] == $currentQuestion->getProp1()) : ?>true
                    <?php else : ?>false
                    <?php endif; ?>
                <?php endif; ?>
            ">
                <div class="question">
                  <div class="level <?= $currentQuestion->getLevelNameById($currentQuestion->getLevelId())[1] ?>">
                    <?= $currentQuestion->getLevelNameById($currentQuestion->getLevelId())[1] ?>
                  </div>
                    <h4><?= $currentQuestion->getQuestion() ?></h3>
                </div>
            </div>

            <?php shuffle ($props[($currentQuestion->getId())-1]) ?>

            <div class="centerPart">
            
            <?php if ($connectedUser !== false && empty($_POST) !== false) : ?>

                <?php for ($i = 0; $i <= 3; $i++) : ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="<?= ($currentQuestion->getId()) ?>" id="Question<?= ($currentQuestion->getId()) ?>Prop<?= ($i)+1 ?>" value="<?= $props[(($currentQuestion->getId())-1)][$i] ?>">

                    <label class="form-check-label" for="Question<?= ($currentQuestion->getId()) ?>Prop<?= ($i)+1 ?>">
                        <?= $props[(($currentQuestion->getId())-1)][$i] ?>
                    </label>
                </div>
                <?php endfor; ?>
            
            <?php elseif ($connectedUser !== false && empty($_POST) === false) : ?>

                <?php for ($i = 0; $i <= 3; $i++) : ?>
                <div class="form-check">
                    <label class="form-check-label 
                        <?php if ( $props[(($currentQuestion->getId())-1)][$i] === $_POST[$currentQuestion->getId()] ) : ?>

                            <?php if ($currentQuestion->getProp1() == $props[(($currentQuestion->getId())-1)][$i]) : ?>correct
                            <?php endif; ?>

                            <?php if ($_POST[$currentQuestion->getId()] !== $currentQuestion->getProp1()) : ?>wrong 
                            <?php endif; ?>

                        <?php elseif ( $props[(($currentQuestion->getId())-1)][$i] !== $_POST[$currentQuestion->getId()] &&  $currentQuestion->getProp1() == $props[(($currentQuestion->getId())-1)][$i] && $_POST[$currentQuestion->getId()]!== null) : ?>correct 


                        <?php endif; ?>" 
                    for="Question<?= ($currentQuestion->getId()) ?>Prop<?= ($i)+1 ?>">
                        <?= $props[(($currentQuestion->getId())-1)][$i] ?>
                    </label>
                </div>
                <?php endfor; ?>

            <?php else : ?>

                <?php for ($i = 0; $i <= 3; $i++) : ?>
                  <div class="form-check"><?= ($i)+1 ?>.&nbsp;
                      <label class="form-check-label" for="">
                          <?= $props[(($currentQuestion->getId())-1)][$i] ?>
                      </label>
                  </div>
                <?php endfor; ?>

            <?php endif; ?>
            </div>
            
            <?php if (isset($_POST[$currentQuestion->getId()]) == true) : ?>
            <div class="downPart">
                <div class="">
                    <div class="anecdote"><?= $currentQuestion->getAnecdote() ?></div>
                    <div class="lienWiki">
                        <a href="https://fr.wikipedia.org/wiki/<?= $currentQuestion->getWiki() ?>"> Wikipedia(<?= $currentQuestion->getWiki() ?>)</a>
                    </div>
                </div>
            </div>
            <?php else : ?>
              <div class="">

              </div>
            <?php endif; ?>

        </div>

    <?php endforeach; ?>
    <?php if ($connectedUser !== false) : ?>
        <?php if (empty($_POST) !== false) : ?>
        <button class="btn btn-primary btn-lg btn-block" id ="ok" type="submit">ok</button>
        <?php else : ?>
        <button class="btn btn-success btn-lg btn-block" id ="rejouer" type="submit">rejouer</button>
        <?php endif; ?>
        </button>
    <?php else : ?>
        <div class="upTheFooter"></div>
    <?php endif; ?>
    </form>
</div>
