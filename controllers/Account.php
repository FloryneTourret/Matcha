<?php

Class Account extends Controller{

    public function index(){
        $data = array();
        $this->loadModel('Account_model');
        $this->loadModel('Register_model');
        if(!isset($_SESSION['user']))
            header('Location: /');
        if (isset($_POST['user_token']))
        {
            if ($_POST['user_token'] == $_SESSION['token'])
            {
                if (isset($_POST['user_old_password']) && isset($_POST['user_password']) && isset($_POST['user_password_repeat']))
                {
                    if (strlen($_POST['user_password']) > 11 && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['user_password']))
                    {
                        if ($_POST['user_password'] == $_POST['user_password_repeat'])
                        {
                            $password = trim(htmlspecialchars(addslashes($_POST['user_old_password'])));
                            $newpassword = trim(htmlspecialchars(addslashes($_POST['user_password'])));
                            if ($this->Account_model->isPasswordOk($password, $_SESSION['user']['user_id']) == TRUE)
                            {
                                $pass = password_hash($newpassword, PASSWORD_DEFAULT);
                                $this->Account_model->changePassword($pass, $_SESSION['user']['user_id']);
                                $data['success'] = "Votre mot de passe a bien été modifié.";
                            }
                            else
                                $data['error'] = "Ancient mot de passe incorrect.";
                        }
                        else
                            $data['error'] = "Les mots de passent ne correspondent pas.";
                    }
                    else
                        $data['error'] = "Le nouveau mot de passe n'est pas conforme.";
                }

                if (isset($_POST['user_firstname']) && isset($_POST['user_lastname']) && isset($_POST['user_pseudo'])
                    && isset($_POST['user_mail']) && isset($_POST['user_gender']) && isset($_POST['user_orientation']))
                {
                    if ($_POST['user_orientation'] > 0 && $_POST['user_orientation'] < 6 && $_POST['user_gender'] > 0 && $_POST['user_gender'] < 4)
                    {
                        if (!isset($_POST['user_bio']))
                            $bio = NULL;
                        else
                            $bio = trim(htmlspecialchars(addslashes($_POST['user_bio'])));
                        $gender = trim(htmlspecialchars(addslashes($_POST['user_gender'])));
                        $orientation = trim(htmlspecialchars(addslashes($_POST['user_orientation'])));
                        $firstname = ucfirst(trim(htmlspecialchars(addslashes($_POST['user_firstname']))));
                        $lastname = strtoupper(trim(htmlspecialchars(addslashes($_POST['user_lastname']))));
                        $login = strtolower(trim(htmlspecialchars(addslashes($_POST['user_pseudo']))));
                        $email = trim(htmlspecialchars(addslashes($_POST['user_mail'])));
                        if ($this->Register_model->email_already_used($email) == FALSE || $email == $_SESSION['user']['email'])
                        {
                            if ($this->Register_model->login_already_used($login) == FALSE || $login == $_SESSION['user']['login'])
                            {
                                $_SESSION['user']['firstname'] = $firstname;
                                $_SESSION['user']['lastname'] = $lastname;
                                $_SESSION['user']['login'] = $login;
                                $_SESSION['user']['email'] = $email;
                                $_SESSION['user']['biography'] = $bio;
                                $_SESSION['user']['user_orientation_id'] = $orientation;
                                $_SESSION['user']['user_gender_id'] = $gender;
                                $this->Account_model->updateProfile($firstname, $lastname, $login, $email, $bio, $orientation, $gender, $_SESSION['user']['user_id']);
                                $data['success'] = "Votre profil a bien été mis à jour.";
                            }
                            else
                                $data['error'] = "Désolé, ce login est déjà utilisé.";
                        }
                        else
                            $data['error'] = "Désolé, cet email est déjà utilisé.";
                    }
                    else
                        $data['error'] = "Merci de sélectionner une orientation sexuelle.";
                }

                if (isset($_POST['user_notif_active']))
                {
                    if (!isset($_POST['user_notif']))
                        $notif = 0;
                    else
                        $notif = 1;
                    $this->Account_model->updateNotif($notif, $_SESSION['user']['user_id']);
                    $_SESSION['user']['notif'] = $notif;
                    $data['success'] = "Vos préférences ont bien été mises à jour.";
                }

            }
            else
                $data['error'] = "Une erreur est survenue.";
        }
        if (!empty($_FILES) && isset($_POST['crop-x']) && isset($_POST['crop-y']) && isset($_POST['crop-height']) && isset($_POST['crop-width']))
        {

            if ($_FILES['newimg']['type'] == 'image/jpeg' || $_FILES['newimg']['type'] == 'image/png'
                    || $_FILES['newimg']['type'] == 'image/jpg')
            {
                $check = getimagesize($_FILES['newimg']['tmp_name']);
                if ($check !== false)
                    $upload = 1;
                else
                    $upload = 0;
                if ($upload == 1)
                {
                    $userdir = '/var/www/html/assets/upload/';
                    if (!file_exists($userdir . $_SESSION['user']['login'])) {
                        mkdir($userdir . $_SESSION['user']['login'], 0777, true);
                    }
                    $target_dir = '/var/www/html/assets/upload/'.$_SESSION['user']['login'].'/';
                    $name = bin2hex(openssl_random_pseudo_bytes(8));
                    while (file_exists('/var/www/html/assets/upload'.$_SESSION['user']['login'].'/'.$name))
                        $name = bin2hex(openssl_random_pseudo_bytes(8));
                    if ($_FILES['newimg']['type'] == 'image/png')
                    {
                        $img = imagecreatefrompng($_FILES['newimg']['tmp_name']);
                        $name = $name.'.png';
                    }
                    else if ($_FILES['newimg']['type'] == 'image/jpeg')
                    {
                        $img = imagecreatefromjpeg($_FILES['newimg']['tmp_name']);
                        $name = $name.'.jpg';
                    }
                    $bg = imagecreatetruecolor($_POST['crop-width'][0], $_POST['crop-height'][0]);
                    $target_file = $target_dir . $name;
                    imagecopy($bg, $img, 0, 0, $_POST['crop-x'][0], $_POST['crop-y'][0], $_POST['crop-width'][0], $_POST['crop-height'][0]);
                    imagejpeg($bg, $target_file);
                    imagedestroy($bg);
                    imagedestroy($img);
                    $target = 'assets/upload/'.$_SESSION['user']['login'].'/'.$name;
                    $this->Account_model->addimg($target, $_SESSION['user']['user_id']);
                    $data['success'] = "Votre image a été enregistrée.";
                }
                else
                    $data['error'] = 'Le fichier renseigné n\'est pas une image';
            }
            else
                $data['error'] = 'Format d\'image non autorisé';
        }
        if(isset($_GET['delete']))
        {
            if($_GET['delete'] == $_SESSION['user']['user_id'])
                $this->Account_model->delete($_GET['delete']);
        }
        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Account/index_view', $data);
        $this->loadView('Base/footer_view');
    }
}