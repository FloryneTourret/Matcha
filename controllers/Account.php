<?php

Class Account extends Controller{

    public function index(){
        $data = array();
        $this->loadModel('Account_model');
        $this->loadModel('Register_model');
        $this->loadModel('Profile_model');
        $this->loadModel('Login_model');
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
                    && isset($_POST['user_mail']) && isset($_POST['user_gender']) && isset($_POST['user_orientation'])
                    && isset($_POST['user_birthdate']))
                {
                    if ($_POST['user_orientation'] > 0 && $_POST['user_orientation'] < 6 && $_POST['user_gender'] > 0 && $_POST['user_gender'] < 4)
                    {
                        if($_POST['user_birthdate'] == date('Y-m-d', strtotime($_POST['user_birthdate'])))
                        {
                            $birthdate = $_POST['user_birthdate'];
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
                                    $_SESSION['user']['user_birthdate'] = $birthdate;
                                    $this->Account_model->del_tags_user($_SESSION['user']['user_id']);
                                    if(isset( $_POST['user_tags']))
                                    {
                                        foreach($_POST['user_tags'] as $tag)
                                        {
                                            if (is_numeric($tag))
                                                $this->Account_model->add_tag_user($tag, $_SESSION['user']['user_id']);
                                            else
                                            {
                                                $id_tag = $this->Account_model->add_tag(trim(htmlspecialchars(addslashes($tag))));
                                                $this->Account_model->add_tag_user($id_tag, $_SESSION['user']['user_id']);
                                            }
                                        }
                                    }
                                    $_SESSION['user']['user_tags'] = $this->Login_model->get_user_tags($_SESSION['user']['user_id']);
                                    $this->Account_model->updateProfile($firstname, $lastname, $login, $email, $bio, $orientation, $gender, $birthdate, $_SESSION['user']['user_id']);
                                    if(!empty($_POST['route']) && !empty($_POST['locality']) && !empty($_POST['country']) && !empty($_POST['latitude']) && !empty($_POST['longitude']))
                                    {
                                        if(!empty($_POST['street_number']))
                                            $street_number = trim(htmlspecialchars(addslashes($_POST[ 'street_number'])));
                                        else
                                            $street_number = '';
                                        if (!empty($_POST[ 'postal_code']))
                                            $postal_code = trim(htmlspecialchars(addslashes($_POST[ 'postal_code'])));
                                        else
                                            $postal_code = '';
                                        $route = trim(htmlspecialchars(addslashes($_POST['route'])));
                                        $city = trim(htmlspecialchars(addslashes($_POST['locality'])));
                                        $country = trim(htmlspecialchars(addslashes($_POST['country'])));
                                        $latitude = trim(htmlspecialchars(addslashes($_POST['latitude'])));
                                        $longitude = trim(htmlspecialchars(addslashes($_POST['longitude'])));

                                        $address = trim($street_number.' '. $route.', '. $postal_code.' '. $city . ', '. $country);

                                        $this->Account_model->updateAddress($longitude, $latitude, $address, $city, $country, $_SESSION['user']['user_id']);

                                        $_SESSION['user']['longitude'] = $longitude;
                                        $_SESSION['user']['latitude'] = $latitude;
                                        $_SESSION['user']['address'] = $address;
                                        $_SESSION['user']['city'] = $city;
                                        $_SESSION['user']['country'] = $country;
                                    }

                                    $data['success'] = "Votre profil a bien été mis à jour.";
                                }
                                else
                                    $data['error'] = "Désolé, ce login est déjà utilisé.";
                            }
                            else
                                $data['error'] = "Désolé, cet email est déjà utilisé.";
                        }
                        else
                            $data['error'] = "Merci de sélectionner une date de naisssance valide.";
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
                    $_SESSION['user']['count_pictures']++;
                    header('Location: /index.php/Profile/' . $_SESSION['user']['login']);
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
        if(isset($_GET['profile_picture']))
        {
            $this->Account_model->profileimg($_GET['profile_picture'], $_SESSION['user']['user_id']);
            $_SESSION['user']['path_profile_picture'] = $this->Account_model->getprofileimg($_SESSION['user']['user_id'])['path_profile_picture'];
        }
        if(isset($_GET['delete_picture']))
        {
            if ($this->Account_model->getprofileimg($_SESSION['user']['user_id'])['path_profile_picture'] == $this->Account_model->getimg($_GET['delete_picture'])['picture_path']){
                $this->Account_model->delete_profile_picture($_SESSION['user']['user_id']);
                $_SESSION['user']['path_profile_picture'] = NULL;
            }
            $this->Account_model->delete_picture($_GET['delete_picture'], $_SESSION['user']['user_id']);
            $_SESSION['user']['count_pictures']--;
        }

        $data['pictures'] = $this->Profile_model->get_pictures($_SESSION['user']['user_id']);
        $data['tags'] = $this->Account_model->get_tags();
        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Account/index_view', $data);
        $this->loadView('Base/footer_view');
    }
}