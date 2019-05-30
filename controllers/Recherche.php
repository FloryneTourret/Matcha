<?php

Class Recherche extends Controller{

    public function index(){
        $this->loadModel('Recherche_model');
        $data['tags'] = $this->Recherche_model->get_tags();
        
        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Recherche/index_view',$data);
        $this->loadView('Base/footer_view');
    }

    public function sort($type = 'classic')
    {
        $this->loadModel('Recherche_model');
        $data = array();
        if (
            !empty($_GET['orientation']) || !empty($_GET['latitude']) ||
            !empty($_GET['min_age']) || !empty($_GET['max_age']) ||
            !empty($_GET['distance']) || !empty($_GET['tags']) ||
            !empty($_GET['min_pop']) || !empty($_GET['max_pop'])
        ) {
            if (!empty($_GET['min_age']) && !empty($_GET['max_age'])) {
                $min = htmlspecialchars(addslashes($_GET['min_age']));
                $max = htmlspecialchars(addslashes($_GET['max_age']));
                if ($min > $max)
                    $data['error'] = "L'age minimum est supérieur à l'âge maximum";
            } else if (!empty($_GET['min_age']) && $_GET['min_age'] != 'none')
                $min = htmlspecialchars(addslashes($_GET['min_age']));
            else if (!empty($_GET['max_age']))
            {
                $min = 18;
                $max = htmlspecialchars(addslashes($_GET['max_age']));
            }
            else {
                $min = 'none';
                $max = 1;
            }
            if (!empty($_GET['orientation']))
                $orientation = htmlspecialchars(addslashes($_GET['orientation']));
            if (!empty($_GET['city']))
                $city = htmlspecialchars(addslashes($_GET['city']));
            else
                $city = 0;
            if (isset($_GET['distance']))
                $distance  = htmlspecialchars(addslashes($_GET['distance']));
            else
                $distance = 'none';
            $tags = json_decode($_GET['tags']);
            if (!empty( $tags[0])) {
                $i = 0;
                foreach ($tags as $tag) {
                    $tags[$i] = htmlspecialchars(addslashes($tag));
                    $i++;
                }
            }
            else{
                $tags = 'none';
            }
            if (isset($_GET['min_pop']) && is_numeric($_GET['min_pop']))
                $min_pop = htmlspecialchars(addslashes($_GET['min_pop']));
            else
                $min_pop = 'none';
            if (isset($_GET['max_pop']) && is_numeric($_GET['max_pop']))
                $max_pop = htmlspecialchars(addslashes($_GET['max_pop']));
            else
                $max_pop = 'none';
            $data['users'] = $this->Recherche_model->get_users_from_search($_SESSION['user']['user_gender_id'],$type, $min, $max, $orientation, $city, $distance, $tags, $min_pop, $max_pop);
        }
        $this->loadView('Accueil/suggestions_view', $data);
    }
}

?>