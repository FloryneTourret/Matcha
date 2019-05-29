<?php

Class Accueil extends Controller{

    public function index(){
        $this->loadModel('Accueil_model');

        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Accueil/index_view');
        $this->loadView('Base/footer_view');
    }

    public function suggestions($type = 'match')
    {
        $this->loadModel('Accueil_model');
        if(isset($_SESSION['user']['user_id']))
            $data['users'] = $this->Accueil_model->get_suggestions($type);
        $this->loadView('Accueil/suggestions_view', $data);
    }
}

?>