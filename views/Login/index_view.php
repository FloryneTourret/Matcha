<?php
if (isset($error))
    echo '<div class="row"><div class="col-md-4 offset-md-4"><p class="has-text-danger">'.$error.'</p></div></div>';
?>
<div class="row">
<form class="col-md-4 offset-md-4" action="/index.php/Login" method="post">
    <div class="form-group">
        <label class="label">Votre pseudo</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
            </div>
            <input class="form-control" type="text" name="user_login" placeholder="Votre pseudo" required value="<?php if(isset($_POST['user_login'])){echo $_POST['user_login'];}?>">
        </div>
    </div>

    <div class="form-group">
        <label class="label">Votre mot de passe <i class="fas fa-info-circle" data-toggle="modal" data-target="#password_modal"></i></label>
        
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock"></i></div>
            </div>
            <input class="form-control" type="password" name="user_password" placeholder="Votre mot de passe" required>
        </div>
    </div>

    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">

    <div class="clearfix">
        <button class="btn btn-secondary mb-2 float-right" type="submit">Me connecter</button>
    </div>
    <div class="clearfix">
      <a class="text-white float-right" href="/index.php/login/forgotpassword">Mot de passe oublié?</a>
    </div>
</form>
</div>

<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Règles de mot de passe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>Votre mot de passe contient au moins : </p>
      <ul class="modal_list">
        <li>12 caractères</li>
        <li>une majuscule</li>
        <li>une minuscule</li>
        <li>un chiffre</li>
        <li>un caractère spécial</li>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Compris !</button>
      </div>
    </div>
  </div>
</div>