<?php

Class Accueil extends Controller{

    public function index(){
        $this->loadModel('Accueil_model');

        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Accueil/index_view');
        $this->loadView('Base/footer_view');
    }

    public function sort($type = 'match')
    {
        $age_min = $_GET['age_min'];
        $age_max = $_GET['age_max'];
        $city = $_GET['city'];
        $distance = $_GET['distance'];
        $pop_min = $_GET['pop_min'];
        $pop_max = $_GET['pop_max'];

        $this->loadModel('Accueil_model');
        if(isset($_SESSION['user']['user_id']))
            $data['users'] = $this->Accueil_model->get_suggestions($type, $age_min, $age_max, $city, $distance, $pop_min, $pop_max);
        $this->loadView('Accueil/suggestions_view', $data);
    }
}

?>