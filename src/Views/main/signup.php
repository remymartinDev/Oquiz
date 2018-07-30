<?php $this->layout('layout') ?>

<div class="container">
    <?php if (!empty($errorList)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= implode('<br>', $errorList) ?>
    </div>
    <?php endif; ?>
    
    <div class="row">
        <form class="col-md-6 m-auto" method="post" action="">
          <div class="form-group">
            <label for="InputFirstName">Nom</label>
            <input type="text" name="first_name" class="form-control" id="InputFirstName" placeholder="nom">
          </div>
          <div class="form-group">
            <label for="InputLastName">Prénom</label>
            <input type="text" name="last_name" class="form-control" id="InputLastName" placeholder="Prénom">
          </div>
          <div class="form-group">
            <label for="InputEmail">Adresse Email</label>
            <input type="email" name="email" class="form-control" id="InputEmai1" placeholder="email">
          </div>
          <div class="form-group">
            <label for="InputPassword1">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="mot de passe">
          </div>
          <div class="form-group">
            <label for="InputPassword2">Confirmation</label>
            <input type="password" name="confirmPassword" class="form-control" id="InputPassword2" placeholder="confirmation du mot de passe">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
