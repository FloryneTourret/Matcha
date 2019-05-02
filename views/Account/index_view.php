<div class="gestion_user">
    <div class="row">
        <div class="col-md-3 offset-md-1">
            <?php if (!empty($error)){ ?>
                <p class="has-text-danger"><?php echo $error; ?></p>
            <?php } ?>
            <?php if (!empty($success)){ ?>
                <p class="has-text-info"><?php echo $success; ?></p>
            <?php } ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3 offset-md-1">
            <aside class="menu">
                <p class="menu-label">
                    Gestion du compte
                </p>
                <hr>
                <nav class="nav flex-column">
                    <a class="nav-link active" onclick="display_profile()" id="display_profile">Modifier mon profil</a>
                    <a class="nav-link" onclick="display_picture()" id="display_picture">Modifier ma photo de profil</a>
                    <a class="nav-link" onclick="display_password()" id="display_password">Changer mon mot de passe</a>
                    <a class="nav-link" onclick="display_notif()" id="display_notif">Mes notfications</a>
                    <a class="nav-link" onclick="display_delete()" id="display_delete">Supprimer mon compte</a>
                </nav>
            </aside>
        </div>
       
        <div class="col-md-7">
            <div class="container-changepicture" id="picture">
                <figure class="image is-128x128 img_user">
                    <?php if (!empty($_SESSION['user']['path_profile_picture'])){?>
                        <div style='background-image: url("/<?php echo $_SESSION['user']['path_profile_picture']?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 128px; width: 128px;'>
                    <?php }else{ ?>
                    <div style='background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 128px; width: 128px;'>
                    <?php } ?>
                    </div>
                </figure>
                <form action="/index.php/Account" method="post" enctype="multipart/form-data" class="form_upload">
                    
                    <div class="input-group">
                        <div class="custom-file">
                        <input class="custom-file-input" id="file_upload" onchange="name_input()" type="file" name="newimg" id="newimg" accept="image/*">
                            <label class="custom-file-label" id="file_output">Charger un fichier</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Envoyer !</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container-changeprofile" id="profile">
                <form action="/index.php/Account" method="post">

                    <div class="form-group">
                        <label>Prénom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="user_firstname" placeholder="Prénom" required value="<?php echo $_SESSION['user']['firstname']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="user_lastname" placeholder="Nom" required value="<?php echo $_SESSION['user']['lastname']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pseudo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="user_pseudo" placeholder="Pseudo" required value="<?php echo $_SESSION['user']['login']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Adresse email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input class="form-control" type="mail" name="user_mail" placeholder="Adresse email" required value="<?php echo $_SESSION['user']['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Biographie</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-pen-nib"></i></div>
                            </div>
                            <textarea class="form-control" type="text" name="user_bio" placeholder="Biographie"><?php if (!empty($_SESSION['user']['biography'])) echo $_SESSION['user']['biography'];?></textarea>
                        </div>
                    </div>
                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">
                    <div class="clearfix">
                        <button class="btn btn-secondary mb-2 float-right" type="submit">Mettre à jour mon profil</button>
                    </div>
                </form>
            </div>


            <div class="container-changepassword" id="password">
                <form action="/index.php/Account" method="post">
                    <div class="form-group">
                        <label class="label">Votre mot de passe actuel</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input class="form-control" type="password" name="user_old_password" placeholder="Votre mot de passe actuel" required value="<?php if(isset($_POST['user_login'])){echo $_POST['user_login'];}?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Votre nouveau mot de passe <i class="fas fa-info-circle" data-toggle="modal" data-target="#password_modal"></i></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input class="form-control" type="password" name="user_password" placeholder="Votre mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Répétez votre nouveau mot de passe</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input class="form-control" type="password" name="user_password_repeat" placeholder="Votre mot de passe" required>
                        </div>
                    </div>
                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">
                    <div class="clearfix">
                        <button class="btn btn-secondary mb-2 float-right" type="submit">Modifier mon mot de passe</button>
                    </div>
                </form>
            </div>

            <div class="container-changenotif" id="notif">
                <form action="/index.php/Account" method="post">
                    <div class="field">
                        <label class="label">Recevoir des notifications?</label>
                        <label class="switch">
                            <?php if($_SESSION['user']['notif'] == 0) {?>
                            <input type="checkbox" name="user_notif">
                            <?php } else {?>
                            <input type="checkbox" name="user_notif" checked>
                            <?php } ?>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">
                    <input class="input" name="user_notif_active" type="hidden" value="<?php echo $_SESSION['token'];?>">
                    <div>
                        <button class="btn btn-secondary mb-2" type="submit">Mettre à jour mes paramètres</button>
                    </div>
                </form>
            </div>

            <div class="container-delete" id="delete">

                <div class="column">
                    <div class="field">
                        <label class="label label-danger">Supprimer mon compte ?</label>
                        <p class="has-text-danger">Attention, cette action est irreversible. Une fois le compte supprimé, toutes les données seront effacées et ne pourront pas être récupérées.</p>
                    </div>
                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">
                    <input class="input" name="user_delete" type="hidden" value="<?php echo $_SESSION['token'];?>">
                    <div>
                        <button class="btn btn-danger mb-2" onclick="account_delete('<?php echo $_SESSION['user']['user_id'];?>')">Supprimer</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
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

<script src="/assets/js/account.js"></script>