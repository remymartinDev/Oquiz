<nav>
    <div class="container-flex">
        <div class="row">

            <div class="col-6" id="title">
                <h1>O'Quiz</h1>
            </div>

            <div class="col-6" id="navigation">

                <?php if ($connectedUser !== false) : ?>
                <div class="container-flex">
                    <div class="row">
                        <div class="btn btn-outline-primary col-3">
                            <div class="">Bonjour &nbsp;<span id="account"><?=$connectedUser->getFirstName() ?></span>
                            </div>
                        </div>
                        <div class="btn btn-outline-primary col-3">
                            <a href="<?= $router->generate('main_home') ?>">
                                <i class="fas fa-home"></i>&nbsp;Accueil</a>
                        </div>
                        <div class="btn btn-outline-primary col-3">
                            <a href="<?= $router->generate('user_profile') ?>">
                                <i class="fas fa-user"></i>&nbsp;Mon compte</a>
                        </div>
                        <div class="btn btn-outline-primary col-3">
                            <a href="<?= $router->generate('user_logout') ?>" id="logout">
                              <i class="fas fa-sign-out-alt"></i>&nbsp;Déconnexion</a>
                        </div>
                    </div>
                </div>

                <?php else : ?>
                <div class="container-flex">
                    <div class="row">
                        <div class="btn btn-outline-primary col-3">
                            <a href="<?= $router->generate('main_home') ?>">
                                <i class="fas fa-home"></i>&nbsp;Accueil</a>
                        </div>
                        <div class="btn btn-outline-primary col-3">
                            <a href="<?= $router->generate('user_signup') ?>">
                                <i class="fas fa-edit"></i>&nbsp;Inscription</a>
                        </div>
                        <div class="btn btn-outline-primary col-3">
                            <a href="<?= $router->generate('user_login') ?>">
                                <i class="fas fa-sign-in-alt"></i>&nbsp;Connexion</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</nav>
