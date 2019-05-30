<?php

Class Accueil extends Controller{

    public function index(){
        $this->loadModel('Accueil_model');
        $this->loadModel('Recherche_model');

        $data['tags'] = $this->Recherche_model->get_tags();
        $this->loadView('Base/header_view');
        $this->loadView('Base/navbar_view');
        $this->loadView('Accueil/index_view', $data);
        $this->loadView('Base/footer_view');
    }

    public function sort($type = 'match')
    {
        if (isset($_GET['age_min']) && is_numeric($_GET['age_min']))
            $age_min = htmlspecialchars(addslashes($_GET['age_min']));
        else
            $age_min = 'none';
        if (isset($_GET['age_max']) && is_numeric($_GET['age_max']))
        {
            $age_max = htmlspecialchars(addslashes($_GET['age_max']));
        }
        else
            $age_max = 'none';
        if (isset($_GET['city']) && ($_GET['city'] != 'none'))
            $city = ucfirst(strtolower(htmlspecialchars(addslashes($_GET['city']))));
        else
            $city = 'none';
        if (isset($_GET['distance']) && is_numeric($_GET['distance']))
            $distance = htmlspecialchars(addslashes($_GET['distance']));
        else
            $distance = 'none';
        if (isset($_GET['pop_min']) && is_numeric($_GET['pop_min']))
            $pop_min = htmlspecialchars(addslashes($_GET['pop_min']));
        else
            $pop_min = 'none';
        if (isset($_GET['pop_max']) && is_numeric($_GET['pop_max']))
            $pop_max = htmlspecialchars(addslashes($_GET['pop_max']));
        else
            $pop_max = 'none';
        if (isset($_GET['tags']))
            $tags = $_GET['tags'];
        else
            $tags = 'none';
        if($tags != 'none')
            $tags = json_decode($tags);
        $i = 0;
        $this->loadModel('Accueil_model');
        if ($tags != 'none')
        {
            foreach($tags as $tag)
            {
                $tag = htmlspecialchars(addslashes($tag));
                if ($this->Accueil_model->is_valid_tag($tag) == 0)
                    array_splice($tags, $i, 1);
                $i++;
            }
        }
        if(isset($_SESSION['user']['user_id']))
            $data['users'] = $this->Accueil_model->get_suggestions($type, $age_min, $age_max, $city, $distance, $pop_min, $pop_max, $tags);
        $this->loadView('Accueil/suggestions_view', $data);
    }
}

?>