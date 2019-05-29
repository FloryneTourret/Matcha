<?php

Class Recherche extends Controller{

    public function index(){
        $this->loadModel('Recherche_model');
        $data['tags'] = $this->Recherche_model->get_tags();
        
        if (!empty($_POST['orientation']) || !empty($_POST['latitude']) ||
            !empty($_POST['min_age']) || !empty($_POST['max_age']) || 
            !empty($_POST['distance']) || !empty($_POST['tags']))
        {
            if (!empty($_POST['min_age']) && !empty($_POST['max_age']))
            {
                $min = htmlspecialchars(addslashes($_POST['min_age']));
                $max = htmlspecialchars(addslashes($_POST['max_age']));
                if ($min > $max)
                    $data['error'] = "L'age minimum est supérieur à l'âge maximum";
            }
            else if (!empty($_POST['min_age']))
                $min = htmlspecialchars(addslashes($_POST['min_age']));
            else if (!empty($_POST['max_age']))
                $max = htmlspecialchars(addslashes($_POST['max_age']));
            else
            {
                $min = 0;
                $max = 2018;
            }
            if (!empty($_POST['orientation']))
                $orientation = htmlspecialchars(addslashes($_POST['orientation']));
            if (!empty($_POST['locality']))
                $city = htmlspecialchars(addslashes($_POST['locality']));
            else
                $city = 0;
            if (!empty($_POST['distance']))
                $distance  = htmlspecialchars(addslashes($_POST['distance']));
            else
                $distance = 2147483647;
            $tags = array();
            if (!empty($_POST['tags'][0]))
            {
                $i = 0;
                foreach($_POST['tags'] as $tag)
                {
                    $tags[$i] = htmlspecialchars(addslashes($tag));
                    $i++;
                }
            }
            $search = $this->Recherche_model->get_users_from_search($_SESSION['user']["orientation_name"], $min, $max, $orientation, $city, $distance, $tags);
        }
        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Recherche/recherche_view',$data);
        $this->loadView('Base/footer_view');
    }
}

?>