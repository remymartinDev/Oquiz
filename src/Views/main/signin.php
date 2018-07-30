<?php $this->layout('layout') ?>

<div class="container">
    <h2>Connexion</h2>
    <div class="row">
        <div class="alert alert-danger" id="errorsDiv" role="alert" style="display:none;">
        </div>

        <form class="col-md-6 m-auto" action="" method="post" id="formLogin">
          <div class="form-group">
            <label for="InputEmail">Adresse email</label>
            <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Adresse email">
          </div>
          <div class="form-group">
            <label for="InputPassword1">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Mot de passe">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
