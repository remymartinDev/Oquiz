<nav>
    <div class="container-flex">
        <div class="row">

            <div class="col-4" id="title">
                <h1>O'Quiz</h1>
            </div>
            <div class="col-3" id="warpzone"><?php if ($connectedUser == false) : ?>(si vous souhaitez tester cette appli sans vous enregistrer: login: user@user.com password:invitation)<?php endif; ?></div>
            
            <div class="col-5" id="navigation">

                <?php if ($connectedUser !== false) : ?>

                <div class="account">Bonjour &nbsp;<span id="user"><?=$connectedUser->getFirstName() ?></span></div>

                <a href="<?= $router->generate('main_home') ?>">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-home"></i>&nbsp;Accueil
                    </button>
                </a>
                <a href="<?= $router->generate('main_compte') ?>">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-user"></i>&nbsp;Mon compte
                    </button>
                </a>
                <a href="<?= $router->generate('main_logout') ?>">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-sign-out-alt"></i>&nbsp;Déconnexion
                    </button>
                </a>

                <?php else : ?>

                <a href="<?= $router->generate('main_home') ?>">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-home"></i>&nbsp;Accueil
                    </button>
                </a>
                <a href="<?= $router->generate('main_signup') ?>">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-edit"></i>&nbsp;Inscription
                    </button>
                </a>
                <a href="<?= $router->generate('main_signin') ?>">
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-sign-in-alt"></i>&nbsp;Connexion
                    </button>
                </a>

                <?php endif; ?>
            </div>


        </div>
    </div>
</nav>
