<?php

Class Recherche_model extends Model
{
    public function get_tags()
    {
        $req = $this->db->prepare("SELECT * FROM `tags` WHERE 1 ORDER BY `tag_name` ASC");
        $req->execute();
        return ($req->fetchAll());
    }

    public function get_users_from_search($genre, $min, $max, $orientation, $locality, $distance, $tags)
    {
        $datemin = date("Y-m-d", strtotime(date("Y-m-d").'-'.$min.' year'));
        $datemax = date("Y-m-d", strtotime(date("Y-m-d").'-'.$max.' year'));
        $req = $this->db->prepare("");
        $req->execute();
        return ($req->fetchAll());
    }
}

?>