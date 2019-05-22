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
            $login = htmlspecialchars(addslashes($login));
        }
        $data['user'] = $this->Profile_model->get_current($login);
        $id = $data['user']['user_id'];
        if($this->Profile_model->get_blocked($_SESSION['user']['user_id'], $id) == FALSE)
        {
            $data['user_tags'] = $this->Profile_model->get_user_tags($login);
            $data['pictures'] = $this->Profile_model->get_pictures($id);
            $data['like'] = $this->Profile_model->get_like($_SESSION['user']['user_id'], $id);
            $data['liked'] = $this->Profile_model->get_liked($_SESSION['user']['user_id'], $id);
            $data['report'] = $this->Profile_model->get_report($_SESSION['user']['user_id'], $id);
            $data['block'] = $this->Profile_model->get_block($_SESSION['user']['user_id'], $id);
            $data['views'] = $this->Profile_model->get_views($id);
            $data['likes'] = $this->Profile_model->get_likes($id);
            $data['mylikes'] = $this->Profile_model->get_mylikes($id);
            $data['blacklist'] = $this->Profile_model->get_blacklist($id);
            if ($data['user'] == FALSE)
            {
                $data['error'] = "Le profil que vous recherchez n'existe pas.";
                $this->loadView('Base/navbar_view');
                $this->loadView('Base/header_view');
                $this->loadView('Profile/invalid_view', $data);
                $this->loadView('Base/footer_view');
            }
            else {
                if($id != $_SESSION['user']['user_id'])
                    $this->Profile_model->view_profile($_SESSION['user']['user_id'], $id);
                $this->loadView('Base/header_view');
                $this->loadView('Base/navbar_view');
                $this->loadView('Profile/index_view', $data);
                $this->loadView('Base/footer_view');
            }
        } 
        else {
            $data['error'] = "Vous ne pouvez pas accèder à ce profil.";
            $this->loadView('Base/navbar_view');
            $this->loadView('Base/header_view');
            $this->loadView('Profile/invalid_view', $data);
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
        if (isset($_GET['user_report']) && isset($_GET['user_reported']) && is_numeric($_GET['user_report']) && is_numeric($_GET['user_reported'])) {
                if ($_GET['user_report'] == $_SESSION['user']['user_id'])
                    if ($this->Profile_model->already_report_user($_SESSION['user']['user_id'], $_GET['user_reported']) == FALSE)
                        $this->Profile_model->report_user($_SESSION['user']['user_id'], $_GET['user_reported']);
                    else
                        $this->Profile_model->unreport_user($_SESSION['user']['user_id'], $_GET['user_reported']);
        }
        if (isset($_GET['user_block']) && isset($_GET['user_blocked']) && is_numeric($_GET['user_block']) && is_numeric($_GET['user_blocked'])) {
            if ($_GET['user_block'] == $_SESSION['user']['user_id'])
                if ($this->Profile_model->already_block_user($_SESSION['user']['user_id'], $_GET['user_blocked']) == FALSE)
                    $this->Profile_model->block_user($_SESSION['user']['user_id'], $_GET['user_blocked']);
                else
                    $this->Profile_model->unblock_user($_SESSION['user']['user_id'], $_GET['user_blocked']);
        }
    }
}