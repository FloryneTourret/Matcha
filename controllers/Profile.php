<?php

Class Profile extends Controller{

    public function index($login = NULL){
        if(!isset($_SESSION['user']))
            header('Location: /');
        
        $this->loadModel('Profile_model');
        $data = array();
        if ($login == NULL)
            $login = $_SESSION['user']['login'];
        else{
            // CREER UNE NOTIF DE VISITE
            $login = htmlspecialchars(addslashes($login));
        }
        $data['user'] = $this->Profile_model->get_current($login);
        $data['user_tags'] = $this->Profile_model->get_user_tags($login);
        $id = $data['user']['user_id'];
        $data['pictures'] = $this->Profile_model->get_pictures($id);
        $data['like'] = $this->Profile_model->get_like($_SESSION['user']['user_id'], $id);
        $data['liked'] = $this->Profile_model->get_liked($_SESSION['user']['user_id'], $id);
        if ($data['user'] == FALSE)
        {
            $data['error'] = "Le profil que vous recherchez n'existe pas.";
            $this->loadView('Base/navbar_view');
            $this->loadView('Base/header_view');
            $this->loadView('Profile/invalid_view', $data);
            $this->loadView('Base/footer_view');
        }
        else
        {
            $this->loadView('Base/header_view');
            $this->loadView('Base/navbar_view');
            $this->loadView('Profile/index_view', $data);
            $this->loadView('Base/footer_view');
        }
        if(isset($_GET['user_like']) && isset($_GET['user_liked']) && is_numeric($_GET['user_like']) && is_numeric($_GET['user_liked']))
        {
            if($_GET['user_like'] == $_SESSION['user']['user_id'])
                if($this->Profile_model->already_like_user($_SESSION['user']['user_id'], $_GET['user_liked']) == FALSE)
                    $this->Profile_model->like_user($_SESSION['user']['user_id'], $_GET['user_liked']);
                else
                    $this->Profile_model->unlike_user($_SESSION['user']['user_id'], $_GET['user_liked']);
            // CREER UNE NOTIFICATION AU LIKE OU UNLIKE ( SI IL Y AVAIT MATCH) + VERIF SI MATCH
        }
    }
}