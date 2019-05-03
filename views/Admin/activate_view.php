<?php if (isset($error)){?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
            <p class="display-4">Activation du compte</p>
            <p class="lead"><?php echo $error; ?></p>
            <form action="/index.php/Admin/activate/<?php echo $token;?>" method="post">
                <p><?php echo $error; ?></p>
                <div class="form-group">
                    <label class="label-dark">Mot de passe <i class="fas fa-info-circle" data-toggle="modal" data-target="#password_modal"></i></label>
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
                    <label class="label-dark">Confirmez votre mot de passe</label>
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
                    <button class="btn btn-secondary mb-2 float-right" type="submit">Valider mon compte</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }else if (isset($fatalerror)){?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
            <p class="display-4">Activation du compte</p>
            <p class="lead"><?php echo $fatalerror; ?></p>
        </div>
    </div>
</div>
<?php } else if (isset($success)) {?>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="jumbotron">
            <p class="display-4">Activation du compte</p>
            <?php if (isset($success_final)){?>
                <p class="lead"><?php echo $success_final; ?></p>
                <div class="clearfix">
                    <a class="float-right btn btn-sm btn-secondary" href="/index.php/Login" class="has-text-grey-dark">Me connecter</a>
                </div>
            <?php }else{ ?>
                    <form action="/index.php/Admin/activate/<?php echo $token;?>" method="post">
                        <p><?php echo $success; ?></p>
                        <div class="form-group">
                            <label class="label-dark">Mot de passe <i class="fas fa-info-circle" data-toggle="modal" data-target="#password_modal"></i></label>
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
                            <label class="label-dark">Confirmez votre mot de passe</label>
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
                            <button class="btn btn-secondary mb-2 float-right" type="submit">Valider mon compte</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>

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