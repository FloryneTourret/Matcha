<?php

Class Admin extends Controller{

    public function index(){
        if(!isset($_SESSION['user']))
            header('Location: /');
        if($_SESSION['user']['admin'] != 1)
            header('Location: /');

        $data = array();
        $this->loadModel('Admin_model');
        $this->loadModel('Register_model');
        $this->loadModel('Random_model');
        $data['users'] = $this->Admin_model->get_users();
        $data['banned'] = $this->Admin_model->get_users_report();

        if(isset($_GET['ban']) && is_numeric($_GET['ban']))
        {
            $this->Admin_model->ban_users($_GET['ban']);
        }
        if(isset($_GET['unban']) && is_numeric($_GET['unban']))
        {
            $this->Admin_model->unban_users($_GET['unban']);
            
        }
        if (isset($_GET['nb_users']) && is_numeric($_GET['nb_users'])) {
            $i = 0;
            while ($i < $_GET['nb_users']){
                $i++;
                $user_gender = random_int(1, 3);
                $user_firstname = trim(ucfirst(htmlspecialchars(addslashes(ucfirst($this->Random_model->random_first_name($user_gender))))));
                $user_lastname = trim(ucfirst(htmlspecialchars(addslashes(strtoupper($this->Random_model->random_last_name())))));
                $user_birthdate = $this->Random_model->randomDate('1970-01-01 00:00:00', '2001-01-01 00:00:00');
                $user_orientation = random_int(1, 5);
                $user_login = trim(ucfirst(htmlspecialchars(addslashes(substr(strtolower($this->Random_model->random_username($user_gender)), 0, 8)))));
                while ($this->Register_model->login_already_used($user_login) == TRUE) {
                    $user_login = trim(ucfirst(htmlspecialchars(addslashes(substr(strtolower($this->Random_model->random_username($user_gender)), 0, 8)))));
                }
                $user_email = trim(ucfirst(htmlspecialchars(addslashes(strtolower($user_login.'@matcha.z4r7p1.fr')))));
                while ($this->Register_model->email_already_used($user_email) == TRUE) {
                    $user_email = trim(ucfirst(htmlspecialchars(addslashes(strtolower( strtolower($this->Random_model->random_username($user_gender)) . '@matcha.z4r7p1.fr')))));
                }
                $user_biography = trim(ucfirst(htmlspecialchars(addslashes($this->Random_model->random_bio()))));
                $user_picture = $this->Random_model->random_picture($user_gender, $user_login);
                $user_password = password_hash('@Password123', PASSWORD_DEFAULT);
                $user_enabled= 1;
                $position = $this->Random_model->random_position();
                $user_longitude = $position['long'];
                $user_latitude = $position['lat'];
                $address = $this->Random_model->get_address($user_latitude, $user_longitude);
                $user_address = trim(ucfirst(htmlspecialchars(addslashes($address['results']['0']['formatted_address']))));
                $address = explode(',', $user_address);
                $user_city = trim(ucfirst(htmlspecialchars(addslashes(substr($address[count($user_address)], 7)))));
                $user_country = trim(ucfirst(htmlspecialchars(addslashes($address[count($user_address) + 1]))));
                $user_tags = $this->Random_model->random_tags();
                
                $id = $this->Admin_model->create_user($user_firstname, $user_lastname, $user_birthdate, $user_gender, $user_orientation,
                        $user_login, $user_email, $user_biography, $user_picture, $user_password, $user_enabled, $user_longitude,
                        $user_latitude, $user_address, $user_city, $user_country);
                $this->Admin_model->picture_user($id, $user_picture);
                $this->Admin_model->tags_user($id, $user_tags);
            }
        }

        if (isset($_POST['user_firstname']) && isset($_POST['user_lastname']) && isset($_POST['user_email'])
            && isset($_POST['user_email_confirm']) && isset($_POST['user_login']) && isset($_POST['user_token']))
        {
            if($_POST['user_token'] == $_SESSION['token'])
            {
                if ($_POST['user_email'] == $_POST['user_email_confirm'])
                {
                    $firstname = trim(ucfirst(htmlspecialchars(addslashes($_POST['user_firstname']))));
                    $lastname = trim(strtoupper(htmlspecialchars(addslashes($_POST['user_lastname']))));
                    $login = trim(strtolower(htmlspecialchars(addslashes($_POST['user_login']))));
                    $email = trim(strtolower(htmlspecialchars(addslashes($_POST['user_email']))));

                    if ($this->Register_model->email_already_used($email) == FALSE)
                    {
                        if ($this->Register_model->login_already_used($login) == FALSE)
                        {
                            $token = bin2hex(openssl_random_pseudo_bytes(15));
                            $link = $_SERVER["HTTP_REFERER"].'/activate/'.$token;
                            $this->Admin_model->register($firstname, $lastname, $login, $email, $token);
                            $message = "Bienvenue sur Matcha\r\nPour activer votre compte administrateur, veuillez cliquer sur le lien suivant\r\n".$link;
                            mail($email, 'Matcha - Admin - Account verification', $message);
                            header('Location: /index.php/Admin');
                        }
                        else
                            $data['error'] = "Désolé, ce login est déjà utilisé.";
                    }
                    else
                        $data['error'] = "Désolé, cet email est déjà utilisé.";    
                }
                else
                    $data['error'] = "Les emails ne correspondent pas.";
            }
            else
                $data['error'] = "Une erreur est survenue.";
        }
        
        $this->loadModel('Profile_model');
        $data['notifs'] = $this->Profile_model->get_notifs($_SESSION['user']['user_id']);
        $data['notif_message'] = $this->Profile_model->get_notif_messages($_SESSION['user']['user_id']);
        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view', $data);
        $this->loadView('Admin/index_view', $data);
        $this->loadView('Base/footer_view');
    }

    public function activate($token = null)
    {
        if(!isset($_POST))
        {
            $_SESSION = array();
            session_destroy();
            session_start();
            if (!isset($_SESSION['token'])) {
                $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(6));
            }
        }
        if(isset($_SESSION['user']))
            header('Location: /');
        
        $this->loadModel('Admin_model');
        $this->loadModel('Register_model');
        $data = array();
        $data['token'] = $token;
        $token = trim(htmlspecialchars(addslashes($token)));
        if ($this->Register_model->token_exists($token))
        {
            if (!($this->Register_model->expirated_token($token)))
            {
                $data['success'] = "Afin d'activer votre compte, merci de choisir un mot de passe.";
                if (isset($_POST['user_password'])&& isset($_POST['user_password_confirm']) && isset($_POST['user_token']))
                {
                    if($_POST['user_token'] == $_SESSION['token'])
                    {
                        if ($_POST['user_password'] == $_POST['user_password_confirm'])
                        {
                            if (strlen($_POST['user_password']) > 11 && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['user_password'])) 
                            {
                                $password = password_hash(htmlspecialchars(addslashes($_POST['user_password'])), PASSWORD_DEFAULT);
                                $this->Admin_model->activate($token, $password);
                                $data['success_final'] = "Votre compte est validé. Vous pouvez maintenant vous connecter."; 
                            }
                            else
                                $data['error'] = "Le mot de passe n'est pas conforme.";
                        }
                        else
                            $data['error'] = "Les mots de passe ne correspondent pas.";
                    }
                    else
                        $data['error'] = "Une erreur est survenue.";
                }
            }
            else
                $data['fatalerror'] = "Le token de validation est expiré.";
        }
        else
            $data['fatalerror'] = "Le token est invalide.";
        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Admin/activate_view', $data);
        $this->loadView('Base/footer_view');
    }
}

?>