<?php
if (isset($error))
    echo '<div class="row"><div class="col-md-4 offset-md-4"><p class="has-text-danger">'.$error.'</p></div></div>';
?>
<div class="row">
<form class="col-md-4 offset-md-4" action="/index.php/Register" method="post">

    <div class="form-group">
        <label class="label">Prénom</label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input class="form-control" type="text" name="user_firstname" placeholder="Votre prénom" required value="<?php if(isset($_POST['user_firstname'])){echo $_POST['user_firstname'];}?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Nom</label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input class="form-control" type="text" name="user_lastname" placeholder="Votre nom" required value="<?php if(isset($_POST['user_lastname'])){echo $_POST['user_lastname'];}?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Pseudo</label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input class="form-control" type="text" name="user_login" placeholder="Votre pseudo" required value="<?php if(isset($_POST['user_login'])){echo $_POST['user_login'];}?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Email</label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input class="form-control" type="email" name="user_email" placeholder="Votre adresse email" required value="<?php if(isset($_POST['user_email'])){echo $_POST['user_email'];}?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Confirmez votre email</label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input class="form-control" type="email" name="user_email_confirm" placeholder="Confirmez votre adresse email" required value="<?php if(isset($_POST['user_email_confirm'])){echo $_POST['user_email_confirm'];}?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Mot de passe <i class="fas fa-info-circle" data-toggle="modal" data-target="#password_modal"></i></label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input class="form-control" type="password" name="user_password" placeholder="Votre mot de passe" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="label">Confirmez votre mot de passe</label>
        <div class="control">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input class="form-control" type="password" name="user_password_confirm" placeholder="Confirmez votre mot de passe" required>
            </div>
        </div>
    </div>

    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">

    <div class="clearfix">
        <button class="btn btn-secondary mb-2 float-right" type="submit">M'inscrire</button>
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