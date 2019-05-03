<div class="gestion_user">
    <div class="row">
        <div class="col-md-3 offset-md-1">
            <?php if (!empty($error)){ ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php } ?>
            <?php if (!empty($success)){ ?>
                <p class="text-info"><?php echo $success; ?></p>
            <?php } ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3 offset-md-1">
            <aside class="menu">
                <p class="menu-label">
                    Panel admin
                </p>
                <nav class="nav flex-column">
                    <a class="nav-link active" onclick="display_users()" id="display_users">Gérer les utilisateurs</a>
                    <a class="nav-link" onclick="display_admin()" id="display_admin">Ajouter un administrateur</a>
                </nav>
            </aside>
        </div>
        <div class="col-md-7">  
            <div class="container-users" id="users">
                <table class="table">
                    <td class="text-success">Admin</td>
                    <td class="text-danger">Banni</td>
                    <td class="text-warning">Non activé</td>
                    <td class="text-dark">Utilisateur</td>
                </table>
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <th scope="col">Prénom Nom</th>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                    <?php
                        foreach($users as $user){
                            if($user['admin'] == 1)
                                echo '<tr id="tr_'.$user['user_id'].'">
                                <td id="name_'.$user['user_id'].'" class="text-success">'.$user['firstname'].' '.$user['lastname'].'</td>
                                <td>'.$user['login'].'</td>
                                <td class="email">'.$user['email'].'</td>
                                <td id="button_'.$user['user_id'].'"></td>
                                </tr>';
                            else if($user['enabled'] == -1)
                                echo '<tr id="tr_'.$user['user_id'].'">
                                <td id="name_'.$user['user_id'].'" class="text-danger">'.$user['firstname'].' '.$user['lastname'].'</td>
                                <td>'.$user['login'].'</td>
                                <td class="email">'.$user['email'].'</td>
                                <td id="button_'.$user['user_id'].'"><button class="btn btn-sm btn-warning" onclick="unban(\''.$user['user_id'].'\' , \''.$user['enabled'].'\' , \''.$user['admin'].'\')">Autoriser l\'utilisateur</button></td>
                                </tr>';
                            else if($user['enabled'] == 0)
                                echo '<tr id="tr_'.$user['user_id'].'">
                                <td id="name_'.$user['user_id'].'" class="text-warning">'.$user['firstname'].' '.$user['lastname'].'</td>
                                <td>'.$user['login'].'</td>
                                <td class="email">'.$user['email'].'</td>
                                <td id="button_'.$user['user_id'].'"><button class="btn btn-sm btn-danger" onclick="ban(\''.$user['user_id'].'\' , \''.$user['enabled'].'\' , \''.$user['admin'].'\')">Bannir l\'utilisateur</button></td>
                                </tr>';
                            else
                                echo '<tr id="tr_'.$user['user_id'].'">
                                <td id="name_'.$user['user_id'].'" class="text-dark">'.$user['firstname'].' '.$user['lastname'].'</td>
                                <td>'.$user['login'].'</td>
                                <td class="email">'.$user['email'].'</td>
                                <td id="button_'.$user['user_id'].'"><button class="btn btn-sm btn-danger" onclick="ban(\''.$user['user_id'].'\' , \''.$user['enabled'].'\' , \''.$user['admin'].'\')">Bannir l\'utilisateur</button></td>
                                </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="container-admin" id="admin">
                <form action="/index.php/Admin" method="post">

                    <div class="form-group">
                        <label class="label">Prénom</label>
                        <div class="control">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="user_firstname" placeholder="Prénom" required value="<?php if(isset($_POST['user_firstname'])){echo $_POST['user_firstname'];}?>">
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
                            <input class="form-control" type="text" name="user_lastname" placeholder="Nom" required value="<?php if(isset($_POST['user_lastname'])){echo $_POST['user_lastname'];}?>">
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
                            <input class="form-control" type="text" name="user_login" placeholder="Pseudo" required value="<?php if(isset($_POST['user_login'])){echo $_POST['user_login'];}?>">
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
                            <input class="form-control" type="email" name="user_email" placeholder="Adresse email" required value="<?php if(isset($_POST['user_email'])){echo $_POST['user_email'];}?>">
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Confirmez l'email</label>
                        <div class="control">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input class="form-control" type="email" name="user_email_confirm" placeholder="Confirmation adresse email" required value="<?php if(isset($_POST['user_email_confirm'])){echo $_POST['user_email_confirm'];}?>">
                        </div>
                        </div>
                    </div>

                    <input class="form-control" name="user_token" type="hidden" value="<?php echo $_SESSION['token'];?>">

                    <div class="clearfix">
                        <button class="btn btn-secondary mb-2 float-right" type="submit">Inscrire</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script src="/assets/js/admin.js"></script>