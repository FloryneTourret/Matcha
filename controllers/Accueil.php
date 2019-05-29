<?php

Class Accueil extends Controller{

    public function index(){
        $this->loadModel('Accueil_model');
        $data = array();
        if(isset($_SESSION['user']['user_id']))
            $data['users'] = $this->Accueil_model->get_suggestions();

        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Accueil/index_view', $data);
        $this->loadView('Base/footer_view');
    }
}

?>